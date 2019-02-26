<?php
namespace Epharma\Contracts;

interface Crudable{

	public function list($offset, $limit);

	public function create($item);

	public function get($id);
	
	public function update($id, $item);

	public function delete($id);

}