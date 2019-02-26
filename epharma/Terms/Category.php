<?php
namespace Epharma\Terms;


use Epharma\Model\Category as Model;
use Epharma\Contracts\Crudable;


class Category implements Crudable
{
	public function list($page = 1, $per_page = 15)
	{
		return Model::paginate($per_page, ['id', 'name', 'parent'], 'page', $page);
	}


	public function create($item)
	{
		$category = new Model;
		$category->name = $item['name'];
		$category->type = 'category';
		$category->parent = isset($item['parent']) ? $item['parent'] : 0;
		$category->save();

		return $category;
	}

	public function get($id)
	{
		return Model::findOrFail($id);
	}

	public function update($id, $item)
	{
		$category = Model::findOrFail($id);
		$category->name = $item['name'];
		$category->parent = isset($item['parent']) ? $item['parent'] : $category->parent;
		$category->save();

		return $category;
	}

	public function delete($id)
	{
		$category = Model::findOrFail($id);
		$destroy_count = $category->destroy($id);

		if ($destroy_count > 0) {
			return true;
		}

		return false;
	}
}