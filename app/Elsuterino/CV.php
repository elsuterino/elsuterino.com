<?php

namespace Elsuterino;

use App\Project;
use App\SkillGroup;
use PDF;

class CV
{
    /**
     * @var PDF
     */
    protected $pdf;

    /**
     * @param  string  $role
     * @return $this
     */
    public function __construct($role = 'Full Stack Web Developer')
    {
        $data = [
            'skillGroups' => SkillGroup::with('skills')->orderByDesc('order')->get(),
            'projects' => Project::get(),
            'role' => $role,
        ];

        $this->pdf = PDF::loadView('pdf.cv', $data);

        return $this;
    }

    public function save()
    {
        $this->pdf->save(storage_path('app/public/CV.pdf'), $overwrite = true);
    }

    public function open()
    {
        return $this->pdf->inline();
    }
}
