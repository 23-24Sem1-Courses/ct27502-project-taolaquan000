<?php

namespace App\Controllers;

use App\Models\Book;
use App\Models\Category;
class HomeController
{
	public function index()
	{
		render_page('home', [
			'title' => 'Trang chủ',
			'order_error' => session_get_flash('order_error'),
			'order_success' => session_get_flash('order_success'),
			'books_new' => Book::Product_new(),
			'books_like' => Book::Product_like(),
			'books_manga' => Book::Product_manga(),
			'categories' => Category::all()
		]);
	}
	public function showProduct()
	{
		render_page('product', [
			'title' => 'Sản phẩm',
			'books' => Book::all(),
			'categories' => Category::all()
		]);
	}
	public function showProductDetails($id)
	{	$books = Book::all();
		$book = Book::findById($id);
		$user_like=Book::user_like($book->id);
		$similar_product = Book::similar_product($book->category_id, $book->id);
		render_view('product_details', [
			'books' => $books,
			'user_like' => $user_like,
			'book' => $book,
			'similar_product' => $similar_product
		]);
	}
	public function showCart()
	{
		render_view('cart', [
			'books' => Book::all(),
		]);
	}
	public function showContact()
	{
		$data=[
			'title' => 'Liên hệ'
		];
		render_page('contact',$data);
	}
}
