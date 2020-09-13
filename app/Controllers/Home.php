<?php

namespace App\Controllers;

use App\Models\KomenModel;
use App\Models\PostModel;

class Home extends BaseController
{
	public function __construct()
	{
		$this->postModel = new PostModel();
		$this->komenModel = new KomenModel();
	}

	public function index()
	{
		$user = $this->db->query('SELECT * FROM user WHERE email = "' . session('email') . '"')->getRowArray();

		var_dump($user);
		die;

		$query = $this->db->query('SELECT post.id_post, post.judul, post.deskripsi, post.berkas, post.kategori, post.jml_komentar, post.created_at, user.foto, user.nama  FROM post INNER JOIN user ON post.user_id = user.id')->getResultArray();

		$data = [
			'title' => 'Forum Diskusi',
			'diskusi' => $query,
			'user' => $user
		];

		return view('home/index', $data);
	}

	public function detail($id)
	{
		$user = $this->db->query('SELECT * FROM user WHERE email = "' . session('email') . '"')->getRowArray();

		$query = $this->db->query('SELECT post.id_post, post.judul, post.deskripsi, post.berkas, post.kategori, post.jml_komentar, post.created_at, user.foto, user.nama  FROM post INNER JOIN user ON post.user_id = user.id WHERE post.id_post=' . $id)->getRowArray();

		$komen = $this->db->query('SELECT komen.id_komen, komen.deskripsi, komen.berkas, komen.created_at, user.nama, user.foto FROM `komen` INNER JOIN user ON komen.user_id = user.id where komen.target_post =' . $id)->getResultArray();

		$data = [
			'title' => 'Detail Diskusi',
			'diskusi' => $query,
			'komen' => $komen,
			'user' => $user
		];

		return view('home/detail', $data);
	}

	public function create()
	{
		$this->postModel->save([
			'user_id' => $this->request->getVar('user_id'),
			'judul' => $this->request->getVar('judul'),
			'deskripsi' => $this->request->getVar('deskripsi'),
			'berkas' => $this->request->getVar('berkas'),
			'kategori' => $this->request->getVar('kategori'),
		]);

		return redirect()->to('/Home');
	}

	public function komentar()
	{
		$id_post = $this->request->getVar('target_post');

		$this->komenModel->save([
			'target_post' => $this->request->getVar('target_post'),
			'user_id' => $this->request->getVar('user_id'),
			'deskripsi' => $this->request->getVar('deskripsi'),
			'berkas' => $this->request->getVar('berkas'),
		]);

		return redirect()->to('/Home/detail/' . $id_post);
	}

	//--------------------------------------------------------------------

}
