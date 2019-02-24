<?php

namespace Robust\DynamicForms\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Robust\Core\Controllers\Admin\Traits\ViewTrait;
use Robust\Core\Controllers\Admin\Traits\CrudTrait;
use Illuminate\Http\Request;
use Robust\DynamicForms\Repositories\Admin\FormRepository;

/**
 * Class FormController
 * @package Robust\DynamicForms\Controllers\Admin\User
 */
class FormController extends Controller
{
    use CrudTrait, ViewTrait;


    /**
     * FormController constructor.
     * @param Request $request
     * @param FormRepository $model
     */
    public function __construct(
        Request $request,
        FormRepository $model
    )
    {
        $this->request = $request;
        $this->model = $model;
        $this->ui = 'Robust\DynamicForms\UI\Form';
        $this->package_name = 'dynamic-forms';
        $this->view = 'admin.forms';
        $this->title = 'Forms';
    }

    /**
     * @param $slug
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFormJson($slug)
    {
        $model = $this->model->where('slug', $slug)->first();
        return response()->json($model);
    }


    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFormById($id)
    {
        $model = $this->model->where('id', $id)->first();
        return response()->json($model);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllForms()
    {
        $model = $this->model->all();
        return response()->json($model);
    }

    public function showAllForms()
    {
        $data = $this->model->all();
        return view('dynamic-forms::admin.users.forms.all-forms', compact('data'));
    }


}
