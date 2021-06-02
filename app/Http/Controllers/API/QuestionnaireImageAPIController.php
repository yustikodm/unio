<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateQuestionnaireImageAPIRequest;
use App\Http\Requests\API\UpdateQuestionnaireImageAPIRequest;
use App\Models\QuestionnaireImage;
use App\Repositories\QuestionnaireImageRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\QuestionnaireImageResource;
use Response;

/**
 * Class QuestionnaireImageController
 * @package App\Http\Controllers\API
 */

class QuestionnaireImageAPIController extends AppBaseController
{
    /** @var  QuestionnaireImageRepository */
    private $questionnaireImageRepository;

    public function __construct(QuestionnaireImageRepository $questionnaireImageRepo)
    {
        $this->questionnaireImageRepository = $questionnaireImageRepo;
    }

    /**
     * Display a listing of the QuestionnaireImage.
     * GET|HEAD /questionnaireImage
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $hc = ['R', 'I', 'A', 'S', 'E', 'C'];
        $dataCombination = [];

        foreach ($hc as $row) {
            foreach ($hc as $hcsub) {
                if($row != $hcsub){
                    if(count($dataCombination) == 0){                                     
                        array_push($dataCombination, [$row, $hcsub]);
                    }else{
                        $src1 = in_array([$row, $hcsub],$dataCombination);
                        $src2 = in_array([$hcsub, $row],$dataCombination);
                        if($src1 != -1 && $src2 != -1){
                            array_push($dataCombination, [$row, $hcsub]);       
                        }
                    }                
                }
            }            
        }
        
        shuffle($dataCombination);

        $usedId = [];
        $ret = [];

        foreach ($dataCombination as $row) {
            $quest_one = QuestionnaireImage::where('type', $row[0])->whereNotIn('id', $usedId)->inRandomOrder()->first();
            $quest_two = QuestionnaireImage::where('type', $row[1])->whereNotIn('id', $usedId)->inRandomOrder()->first();
            $quest = [
                'quest_one_img_id' => $quest_one->id,
                'quest_one_img_src' => $quest_one->src,               
                'quest_one_img_name' => $quest_one->name,
                'quest_one_type' => $row[0],
                'quest_two_img_id' => $quest_two->id,
                'quest_two_img_src' => $quest_two->src,               
                'quest_two_img_name' => $quest_two->name,
                'quest_two_type' => $row[1],
            ];                        
            array_push($ret, $quest);
            array_push($usedId, $quest_one->id);
            array_push($usedId, $quest_two->id);
        }

        return $this->sendResponse($ret, 'Questionnaire Image retrieved successfully');        
    }



    /**
     * Store a newly created QuestionnaireImage in storage.
     * POST /questionnaireImage
     *
     * @param CreateQuestionnaireImageAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateQuestionnaireImageAPIRequest $request)
    {
        $input = $request->all();

        $questionnaireImage = $this->questionnaireImageRepository->create($input);

        return $this->sendResponse(new QuestionnaireImageResource($questionnaireImage), 'Questionnaire Image saved successfully');
    }

    /**
     * Display the specified QuestionnaireImage.
     * GET|HEAD /questionnaireImage/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var QuestionnaireImage $questionnaireImage */
        $questionnaireImage = $this->questionnaireImageRepository->find($id);

        if (empty($questionnaireImage)) {
            return $this->sendError('Questionnaire Image not found');
        }

        return $this->sendResponse(new QuestionnaireImageResource($questionnaireImage), 'Questionnaire Image retrieved successfully');
    }

    /**
     * Update the specified QuestionnaireImage in storage.
     * PUT/PATCH /questionnaireImage/{id}
     *
     * @param int $id
     * @param UpdateQuestionnaireImageAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateQuestionnaireImageAPIRequest $request)
    {
        $input = $request->all();

        /** @var QuestionnaireImage $questionnaireImage */
        $questionnaireImage = $this->questionnaireImageRepository->find($id);

        if (empty($questionnaireImage)) {
            return $this->sendError('Questionnaire Image not found');
        }

        $questionnaireImage = $this->questionnaireImageRepository->update($input, $id);

        return $this->sendResponse(new QuestionnaireImageResource($questionnaireImage), 'QuestionnaireImage updated successfully');
    }

    /**
     * Remove the specified QuestionnaireImage from storage.
     * DELETE /questionnaireImage/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var QuestionnaireImage $questionnaireImage */
        $questionnaireImage = $this->questionnaireImageRepository->find($id);

        if (empty($questionnaireImage)) {
            return $this->sendError('Questionnaire Image not found');
        }

        $questionnaireImage->delete();

        return $this->sendSuccess('Questionnaire Image deleted successfully');
    }
}
