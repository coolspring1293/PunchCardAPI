<?php
namespace Music\V1\Rest\Album;

use Zend\Db\Sql\Select;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Paginator\Adapter\DbSelect;

class AlbumMapper
{
	protected $adapter;
	public function __construct(AdapterInterface $adapter)
	{
		$this->adapter = $adapter;
	}

	public function fetchAll()
	{
		$select = new Select('album');
		$paginatorAdapter = new DbSelect($select, $this->adapter);
		$collection = new AlbumCollection($paginatorAdapter);
//		$newcoll = array();
//		for ($i = 0; $i < 10; ++ i) {
//			$newcoll.add($this->fetchOne($i));
//		}

		//return $newcoll;

		return $collection;
	}

	public function fetchOne($albumId)
	{
		$sql = 'SELECT * FROM album WHERE id = ?';
		$resultset = $this->adapter->query($sql, array($albumId));
		$data = $resultset->toArray();
		if (!$data) {
			return false;
		}

		$entity = new AlbumEntity();
		$entity->exchangeArray($data[0]);
		return $entity;
	}
}