<?php

namespace App\Modules\Channel\Requests;

use App\Http\Requests\Validator;
use App\Modules\Base\Requests\BaseRequest;

class MediaCreateRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
             'title' => 'required',
             'media_type' => 'required',
             //'file' => 'required|mimes:mp4,ogx,oga,ogv,ogg,webm',
             //'file' => 'required',
             'grade' => 'required',
             'subject' => 'required',
             'publish_type' => 'required',
             //'reason' => 'required_if:review_status,3'
         ];
    }
}
