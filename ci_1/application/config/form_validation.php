<?php 	
	
	$config = [

			'add_article_rules' => [

						[
							'field'=>'title',
							'label'=>'Article Title',
							'rules'=>'required'
						],
						[
							'field'=>'body',
							'label'=>'Article Body',
							'rules'=>'required'

						]
		      ],	
			'admin_login' => [

				[

				'field'=>'username',
				'label'=>'Username',
				'rules'=>'required|alpha|trim'
			],
			[
				'field'=>'password',
				'label'=>'Password',
				'rules'=>'required'

			]
		]

	];