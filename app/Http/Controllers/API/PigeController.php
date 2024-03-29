<?php

namespace App\Http\Controllers\API;

use App\Enum\Role;
use App\Filters\PigeFilters;
use App\Http\Controllers\Controller;
use App\Jobs\CreateOrDeletePostalCodeJob;
use App\Models\Agency;
use App\Models\Configuration;
use App\Services\AgencyService;
use App\Services\CommentaireService;
use App\Services\ConfigurationService;
use App\Services\FavoryService;
use App\Services\PigeService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class PigeController extends Controller
{
    public function __construct(protected PigeService $pigeService, protected AgencyService $agencyService, protected FavoryService $favoryService, protected CommentaireService $commentaireService)
    {
    }

    /**
     * Get all pige by agency, the agency will get info by specifying its API KEY
     * @param \App\Models\Agency $agency
     * @param \Illuminate\Http\Request $request
     * @return JsonResponse
     */
    public function getPigesByAgence(Request $request, PigeFilters $pigeFilters): JsonResponse
    {
        $agency = (new AgencyService)->getById(Auth::user()->agency_id);
        $user = Auth::user()->role === Role::SUPER_ADMIN->value ? null : Auth::user();
        $piges = $this->pigeService->getPigesFromDatabase($agency, $pigeFilters, $user);
        return response()->json(($piges));
    }

    /**
     * Create a new postal code from the given agency
     * @param \Illuminate\Http\Reqeust $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function createPostalCode(Request $request): JsonResponse
    {
        $postalCode = $request->input('postal_code');
        $agency = $this->agencyService->getById(Auth::user()->agency_id);

        $configuration = (new ConfigurationService)->createConfiguration($postalCode);

        $agency->configurations()->save($configuration);

        // dispatch(new CreateOrDeletePostalCodeJob('creation', $configuration, $agency));

        return response()->json($agency);
    }


    /**
     * Remove postal code from the given agency
     * @param \Illuminate\Http\Reqeust $request
     * @param \App\Models\Configuration $configuration
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function removePostalCode(Request $request, Configuration $configuration): JsonResponse
    {
        $configuration = (new ConfigurationService)->removeConfiguration($configuration->id);
        $agency = $this->agencyService->getById(Auth::user()->agency_id);
        // dispatch(new CreateOrDeletePostalCodeJob('creation', $configuration, $agency));

        return response()->json($configuration);
    }

    /**
     * Get pige by ID
     *
     */

    public function getPige(int $pigeId): JsonResponse
    {
        $pige = $this->pigeService->getPigeById($pigeId);

        return response()->json($pige);
    }

    public function createOrRemoveFromFavorie(Request $request): JsonResponse
    {
        $user = Auth::user();

        $favoryId = $request->input('favory_id');
        $pigeId = $request->input('pige_id');

        try {
            $this->favoryService->createOrRemoveFavory($favoryId, $user->id, $pigeId);
            return response()->json('success');
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function createComment(Request $request): JsonResponse
    {
        $user = Auth::user();

        $title = $request->input('title');
        $comment = $request->input('comment');
        $pigeId = $request->input('pige_id');

        try {
            $this->commentaireService->createCommentaire($user->id, $pigeId, $title, $comment);
            return response()->json('success');
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
}
