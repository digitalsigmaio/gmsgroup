<?php
/**
 * Created by PhpStorm.
 * User: Manson
 * Date: 11/26/2017
 * Time: 11:56 AM
 */
namespace App\Transformers;

use App\Project;
use League\Fractal\TransformerAbstract;

class ProjectTransformer extends TransformerAbstract
{
    public function transform(Project $project)
    {
        return [
            'id'             => $project->id,
            'ar_name'        => $project->ar_name,
            'en_name'        => $project->en_name,
            'ar_description' => $project->ar_description,
            'en_description' => $project->en_description,
            'logo'           => $project->logo,
			'images'         => $project->images
        ];
    }


}