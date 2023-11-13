<?php

namespace App\Controllers;

use App\Models\Book;
use App\Models\Category;
class BookController
{
	public function index()
	{
		render_page_admin('book', [
			'books' => Book::all(),
			'categories' => Category::all()
		]);
	}
	public function showAddPage()
	{
		$data = [
			'title' => 'Thêm mới sách',
			'error' => session_get_flash('error'),
			'post_url' => '/admin/books',
			'book' => new Book(),
			'categories' => Category::all()
		];

		render_page_admin('addbook', $data);
	}
	public function create()
	{
		$book = new Book();
		$book->fill($_POST);
		$fileToUpload=$_FILES['fileToUpload'];
      $imagePath = uploadFile($fileToUpload);
		if ($imagePath) {
			$book->image = $imagePath;
			if ($book->save()) {
					redirect('/admin/books');
			} else {
					$_SESSION['error'] = 'Đã có lỗi xảy ra.';
					redirect('/admin/books/add');
			}
		} else {
			$_SESSION['error'] = 'Đã có lỗi xảy ra.';
			redirect('/admin/books/add');
		}
	}
	public function showEditPage($id)
	{
		$categories = Category::all();
		$book = Book::findById($id);
		$check_category = Category::findById($book->category_id);
		if (!$book) {
			redirect('/errors/404');
		}
		$data = [
			'title' => 'Cập nhật sách',
			'error' => session_get_flash('error'),
			'post_url' => '/admin/books/' . $id,
			'book' => $book,
			'check_category' => $check_category,
			'categories' => $categories
		];

		render_page_admin('addbook', $data);
	}

	public function update($id)
	{
		$book = Book::findById($id);
		$book->fill($_POST);
		$fileToUpload=$_FILES['fileToUpload'];
      $imagePath = uploadFile($fileToUpload);
		if ($imagePath) {
			$book->image = $imagePath;
			if ($book && $book->save()) {
					redirect('/admin/books');
			} else {
					$_SESSION['error'] = 'Đã có lỗi xảy ra.';
					redirect('/admin/books/edit/'.$id);
			}
		} else {
			$_SESSION['error'] = 'Đã có lỗi xảy ra.';
			redirect('/admin/books/edit/'.$id);
		}
	}

	public function delete($id)
	{
		$book = Book::findById($id);
		if ($book) {
			$book->delete();
		}

		redirect('/admin/books');
	}
}
