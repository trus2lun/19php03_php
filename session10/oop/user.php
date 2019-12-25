<!-- public: ở ngoài, ở trong đều lấy được -->
<!-- protected: chỉ ở trong một mảng mới lấy được -->
<!-- private: không lấy ra ngoài được -->
<!-- lấy private hoặc protected bằng cách -->
<!-- puclic function change() {
	$this->tên của phương thức muốn lấy ra mà đựng trong private hay protected()
} -->
<!-- sau đó sử dụng phương thức change() thay vì phương thức không lấy được ở trên -->

<?php
	class User {

		// public, protected, private
		public $username = 'name';
		public $email = 'email';
		public $password = 'password';
		public $phone = 'phone';
		public $address = 'address';

		private function add() {
			echo "add user";
		}
		public function edit() {
			echo "edit user";;
		}
		public function register() {
			echo "register";
		}
		public function login() {
			echo "login";
		}
		public function view() {
			echo "view";
		}
		protected function list() {
			echo "list";
		}
		public function delete() {

		}
		public function change() {
			$this->add();
		}
	}

	class Customer extends User {
		public $addresstoship = 'address to ship';
		public $customer = 'customer';

		public function pay() {
			echo "how to pay this man =))";
		}

		public function history() {
			echo "let's check your history man =))";
		}


	}
?>