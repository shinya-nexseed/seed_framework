<?php
    // nsfwのmodelは最適なsql文を返す
    class Blog {

        // プロパティ (カプセル化)
        private $table_name = '';
        private $action = '';

        // マジックメソッド
        public function __construct($table_name, $action) {
            $this->table_name = $table_name;
            $this->action = $action;
        }

        // index
        public function find($option) {

            // シンプルに全件取得
            if ($option == 'all') {
                $sql = sprintf('SELECT * FROM %s',
                    $this->table_name
                );

                return $sql;
            }
            
        }

        // show
        public function findById($id) {
            $sql = sprintf('SELECT * FROM %s WHERE id=%s',
                $this->table_name,
                $id
            );

            return $sql;
        }

        // new (create)
        public function create($blog) {
            $sql = sprintf('INSERT INTO %s SET title="%s", body="%s", created=NOW()',
                $this->table_name,
                $blog['title'],
                $blog['body']
            );

            return $sql;
        }

        // edit (update)
        public function update($blog) {
            $sql = sprintf('UPDATE %s SET title="%s", body="%s", modified=NOW() WHERE id=%s',
                $this->table_name,
                $blog['title'],
                $blog['body'],
                $blog['id']
            );

            return $sql;
        }

        // destroy
        public function destroy($id) {
            $sql = sprintf('DELETE FROM %s WHERE id=%s',
                $this->table_name,
                $id
            );

            return $sql;
        }

    }
?>













