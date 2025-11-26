<?php

namespace App\Controllers;

class Page extends BaseController
{
    public function about()
    {
        echo view("about");
    }

    public function contact()
    {
        $data["name"]="Abdul Malik Hidayatullah";
        echo view("contact",$data);
    }

   public function faqs()
	{
		// membuat data untuk dikirim ke view
		$data['data_faqs']=[
			[
				'question'=>'Apa itu Codeigniter?',
				'answer'=>'Codeigniter adalah framework untuk membuat web'
			],
			[
				'question'=>'Siapa yang membuat Codeiginter?',
				'answer'=>'CI awalnya dibuat oleh Ellislab'
			],
			[
				'question'=>'Codeigniter versi berapakah yang digunakan pada tutoril ini?',
				'answer'=>'Codeigniter versi 4.0.4'
			]
		];

		// load view dengan data
		echo view("faqs", $data);
    }
}