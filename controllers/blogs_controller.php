<?php
    class BlogsController {

        // プロパティ (カプセル化)
        private $db = '';
        private $table_name = '';
        private $action = '';

        // マジックメソッド
        public function __construct ($db, $table_name, $action) {
            $this->db = $db;
            $this->table_name = $table_name;
            $this->action = $action;
        }

        public function index() {
            $Blog = new Blog($this->table_name, $this->action);

            $sql = $Blog->find('all');

            $blogs = mysqli_query($this->db, $sql) or die(mysqli_error($this->db));
            return $blogs;
        }

        public function show($id) {
            $Blog = new Blog($this->table_name, $this->action);

            $sql = $Blog->findById($id);

            $blog = mysqli_query($this->db, $sql) or die(mysqli_error($this->db));
            return $blog;
        }

        public function _new($blog) {
            if (!empty($blog)) {
                $Blog = new Blog($this->table_name, $this->action);
                $sql = $Blog->create($blog);

                mysqli_query($this->db, $sql) or die(mysqli_error($this->db));

                header("Location: index");
            }
        }

        public function edit($id) {

            if (empty($_POST)) {
                $blog_record = $this->show($id);
                $blog = mysqli_fetch_assoc($blog_record);

                return $blog;

            } else if (!empty($_POST)) {

                $blog = $_POST;
                $id = array('id' => $id);
                $blog = array_merge($id, $blog);

                $Blog = new Blog($this->table_name, $this->action);

                $sql = $Blog->update($blog);

                mysqli_query($this->db, $sql) or die(mysqli_error($this->db));

                header("Location: ../index");
            }
        }

        public function delete($id) {
            $Blog = new Blog($this->table_name, $this->action);

            $sql = $Blog->destroy($id);

            mysqli_query($this->db, $sql) or die(mysqli_error($this->db));

            header("Location: ../index");
        }
    }
?>
