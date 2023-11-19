
	<script src="/js/admin/bootstrap.min.js"></script>
	<script src="/js/admin/bootstrap-table.js"></script>	
   <script>
		$(() => {
			$('.delete').click((event) => {
				const trBook = $(event.target).parents('tr');
				const id = trBook.prop('id');
				const title = trBook.children('td:eq(1)').html();
				const question = `Bạn muốn xóa danh mục "${title}"?`;
				const ok = confirm(question);
				if (ok) {
					location.href = `/admin/categories/delete/${id}`;
				}
				return ok;
			});
		});
		$(() => {
			$('.delete_product').click((event) => {
				const trBook = $(event.target).parents('tr');
				const id = trBook.prop('id');
				const title = trBook.children('td:eq(1)').html();
				const question = `Bạn muốn xóa Sách "${title}"?`;
				const ok = confirm(question);
				if (ok) {
					location.href = `/admin/books/delete/${id}`;
				}
				return ok;
			});
		});
	</script>

</body>

</html>
