<?php

namespace App\Controllers;

use App\Models\Category;

class CategoryController
{
	public function admin()
	{
		if(isset($_SESSION['admin'])){
		render_page_admin('home', [
			'categories' => Category::all()
		]);
		} else {
			redirect('/admin/login');
		}
	}
	public function showAddPage()
	{
		$data = [
			'title' => 'Thêm mới danh muc',
			'error' => session_get_flash('error'),
			'post_url' => '/admin',
			'category' => new Category()
		];

		render_page_admin('addcategory', $data);
	}

	public function create()
	{
		$category = new Category();
		if ($category->fill($_POST)->save()) {
			redirect('/admin');
		}

		$_SESSION['error'] = 'Đã có lỗi xảy ra.';
		redirect('/categories/add');
	}

	public function showEditPage($id)
	{
		$category = Category::findById($id);
		if (!$category) {
			redirect('/errors/404');
		}
		$data = [
			'title' => 'Cập nhật sách',
			'error' => session_get_flash('error'),
			'post_url' => '/admin/' . $id,
			'category' => $category
		];

		render_page_admin('addcategory', $data);
	}

	public function update($id)
	{
		$category = Category::findById($id);
		if ($category && $category->fill($_POST)->save()) {
			redirect('/admin');
		}

		$_SESSION['error'] = 'Đã có lỗi xảy ra.';
		redirect('/admin/categories/edit/' . $id);
	}

	public function delete($id)
	{
		$category = Category::findById($id);
		if ($category) {
			$category->delete();
		}

		redirect('/admin');
	}
}
