<?php

namespace App\Modules\Channel\Transformations;

trait ChannelTransformable
{
    protected function transformChannelData(array $data){
        return [
            'member_id' => $data['member_id']
        ];
    }
}
