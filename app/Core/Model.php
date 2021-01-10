<?php
	
	namespace App\Core;
	
	Class Model
	{
		/** 
        * @param
        * 
        * Query Builder
        *
        */
        private static $sql_builder = '';

		/** 
		* Connect to database
		*
		*/
		public static function connect()
		{
			return mysqli_connect(db_host, db_user, db_pass, db_name);
		}

		/** 
        * Raw query database
        *
        */
        public function query($sql)
        {
            $exe 	= self::connect()->query($sql);

            return $exe;
        }

		/** 
		* Store data to database
		*
		*/
		public function store($tabel,$data)
		{
			$r1 	= array();
			$f1 	= array();

			foreach($data as $f2=>$r2)
			{
				array_push($f1,$f2);
				array_push($r1,"'".$r2."'");
			}

			$field 	= implode(',',$f1);
			$row 	= implode(',',$r1);

			$query 	= self::connect()->query("INSERT INTO {$tabel}({$field}) VALUES ({$row})");

			return $query;
		}
	
		/** 
		* Update data to database
		*
		*/
		public function update($tabel_id,$tabel,$data)
		{
			$r1 	= array();

			foreach($data as $f=>$r)
			{
				array_push($r1,$f."="."'".$r."'");
			}

			$key 	= array_keys($tabel_id);
			$key 	= $key[0];
			$id 	= $tabel_id[$key];

			$row 	= implode(',',$r1);

			$query 	= self::connect()->query("UPDATE {$tabel} SET {$row} WHERE {$key}='{$id}'");

			return $query;
		}

		/** 
		* Delete data to database
		*
		*/
		public function delete($tabel_id,$table)
		{
			$key 	= array_keys($tabel_id);
			$key 	= $key[0];
			$id 	= $tabel_id[$key];

			$query 	= self::connect()->query("DELETE FROM {$table} WHERE {$key}='{$id}'");

			return $query;		
		}

		/** 
		* Get insert id
		*
		*/
		public function insert_id()
		{
			$query 	= self::connect()->insert_id;

			return $query;
		}




		/**
        * @var
        *
        * _________________
        * 
        *   Query Builder
        * _________________
        *
        */

        /** 
        * Select query database
        *
        */
        public function select($select)
        {
            self::$sql_builder      = " SELECT {$select} ";

            return $this;
        }

        /** 
        * From query database
        *
        */
        public function from($table)
        {
        	self::$sql_builder 		.= " FROM {$table} ";

            return $this;
        }

        /** 
        * Join query database
        *
        */
        public function join($table, $where1, $where2)
        {
            self::$sql_builder      .= " JOIN {$table} ON {$where1} = {$where2} ";

            return $this;
        }

        /** 
        * Left Join query database
        *
        */
        public function leftJoin($table, $where1, $where2)
        {
            self::$sql_builder      .= " LEFT JOIN {$table} ON {$where1} = {$where2} ";

            return $this;
        }

        /** 
        * Right Join query database
        *
        */
        public function rightJoin($table, $where1, $where2)
        {
            self::$sql_builder      .= " RIGHT JOIN {$table} ON {$where1} = {$where2} ";

            return $this;
        }

        /** 
        * Having query database
        *
        */
        public function having($field, $operator, $value)
        {
            self::$sql_builder      .= " WHERE {$field} {$operator} '{$value}' ";

            return $this;
        }

        /** 
        * Where query database
        *
        */
        public function where($field, $value)
        {
            self::$sql_builder      .= " WHERE {$field} = '{$value}' ";

            return $this;
        }

        /** 
        * Limit query database
        *
        */
        public function limit($value)
        {
            self::$sql_builder      .= " LIMIT {$value} ";

            return $this;
        }

        /** 
        * Order By query database
        *
        */
        public function orderBy($field, $type = 'ASC')
        {
            self::$sql_builder      .= " ORDER BY {$field} {$type} ";

            return $this;
        }

        /** 
        * Group By query database
        *
        */
        public function groupBy($field)
        {
            self::$sql_builder      .= " GROUP BY {$field} ";

            return $this;
        }

        /** 
        * Paginate query database
        *
        */
        public function paginate($start, $page)
        {
            self::$sql_builder      .= " LIMIT {$start}, {$page} ";

            return $this;
        }

        /** 
        * And query database
        *
        */
        public function and($sql = '')
        {
            self::$sql_builder      .= " AND {$sql} ";

            return $this;
        }

        /** 
        * Or query database
        *
        */
        public function or($sql = '')
        {
            self::$sql_builder      .= " OR {$sql} ";

            return $this;
        }

        /** 
        * Raw query database
        *
        */
        public function raw($sql)
        {
            self::$sql_builder      .= $sql;

            return $this;
        }

        /** 
        * Execute query builder database
        *
        */
        public function get()
        {
            $exe                    = self::connect()->query(self::$sql_builder);

            return $exe;
        }

        /** 
        * Result array query database
        *
        */
        public function result_array($exe)
        {
            $result_array = [];

            while ($row = $exe->fetch_assoc())
            {
                $result_array[] = $row;
            }

            return $result_array;
        }
	}