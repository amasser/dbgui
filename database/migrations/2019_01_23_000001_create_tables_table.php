<?php

	use Illuminate\Support\Facades\Schema;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;

	class CreateTablesTable extends Migration {
		
		public function up() {
			
			Schema::create('tables', function (Blueprint $table) {
				
				$table->increments('id');
				
				$table->unsignedInteger('table_group_id');			
				
				$table->foreign('table_group_id')
					->references('id')->on('table_groups')
					->onDelete('cascade');						
				
				$table->string('name');
				
				$table->string('code', 191)->unique();
				
				$table->string('url');
				
				$table->integer('weight')->default(0)->nullable();
				
				$table->string('item_name')->nullable();
				
				$table->string('fa')->default('table')->nullable(); 
				
			});
			
			// Populate
			
			DB::table('tables')->insert(['id' => 1, 'table_group_id' => 1, 'name' => 'Tables', 'code' => 'tables', 'url' => 'tables', 'weight' => 100, 'fa' => 'database', 'item_name' => 'table']);			
			
			DB::table('tables')->insert(['id' => 2, 'table_group_id' => 1, 'name' => 'Fields',  'code' => 'fields', 'url' => 'fields', 'weight' => 90, 'fa' => 'edit', 'item_name' => 'field']);			
			
			DB::table('tables')->insert(['id' => 3, 'table_group_id' => 1, 'name' => 'Field groups',  'code' => 'field_groups', 'url' => 'field-groups', 'weight' => 80, 'fa' => 'table', 'item_name' => 'group']);
			
			DB::table('tables')->insert(['id' => 4, 'table_group_id' => 1, 'name' => 'Table groups',  'code' => 'table_groups', 'url' => 'table-groups', 'weight' => 70, 'fa' => 'list-ul', 'item_name' => 'group']);
						
			DB::table('tables')->insert(['id' => 5, 'table_group_id' => 2, 'name' => 'Users', 'code' => 'users', 'url' => 'users', 'weight' => 100, 'fa' => 'users', 'item_name' => 'user']);			
			
			DB::table('tables')->insert(['id' => 6, 'table_group_id' => 2, 'name' => 'User groups', 'code' => 'user_groups', 'url' => 'user-groups', 'weight' => 90, 'fa' => 'user', 'item_name' => 'group']);			
			
		}
		
		public function down() {
			
			Schema::dropIfExists('tables');
			
		}
		
	}