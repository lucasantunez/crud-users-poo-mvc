<?php

namespace Model;

class ActiveRecord {

    // DataBase
    protected static $db;
    protected static $table = '';
    protected static $columnsDB = [];

    // Errors
    protected static $errors = [];

    
    // Define the connection to the DB
    public static function setDB($database) {
        self::$db = $database;
    }

    // Get Errors
    public static function getErrors() {
        return static::$errors;
    }

    // Validate
    public function validate() {
        static::$errors = [];
        return static::$errors;
    }

    // Save to create and update
    public function save() {
        if(!is_null($this->id)) {
            // update a record
            $this->update();
        } else {
            // Create a new record
            $this->create();
        }
    }

    // Get all records from a table
    public static function all() {
        $query = "SELECT * FROM " . static::$table;

        $result = self::querySQL($query);

        return $result;
    }

    // Find a record by id
    public static function find($id) {
        $query = "SELECT * FROM " . static::$table ." WHERE id = ${id}";

        $result = self::querySQL($query);

        return array_shift($result);
    }

    // Create a new record
    public function create() {
        // Sanitize data
        $attributes = $this->sanitizeAttributes();
        $keys = join(', ', array_keys($attributes));
        $values = join("', '", array_values($attributes));

        $query = "INSERT INTO " . static::$table . " (" . $keys . ") VALUES ('" . $values . "')";

        $result = self::$db->query($query);
        if($result) {
            header('Location: /users');
        }
    }

    // Update a record
    public function update() {
        // Sanitize data
        $attributes = $this->sanitizeAttributes();

        $values = [];
        foreach($attributes as $key => $value) {
            $values[] = "{$key}='{$value}'";
        }

        $query = "UPDATE " . static::$table ." SET ";
        $query .=  join(', ', $values );
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 "; 

        $result = self::$db->query($query);

        if($result) {
            // Redirect user
            header('Location: /users');
        }
    }

    // Delete a record
    public function delete() {
        $query = "DELETE FROM "  . static::$table . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $result = self::$db->query($query);

        if($result) {
            header('location: /users');
        }
    }

    // Run the query
    public static function querySQL($query) {

        $result = self::$db->query($query);
        $array = [];

        while($record = $result->fetch_assoc()) {
            $array[] = static::createObject($record);
        }

        $result->free();
        return $array;
    }

    protected static function createObject($record) {
        $object = new static;

        foreach($record as $key => $value ) {
            if(property_exists( $object, $key  )) {
                $object->$key = $value;
            }
        }

        return $object;
    }

    public function attributes() {
        $attributes = [];

        foreach(static::$columnsDB as $column) {
            if($column === 'id') continue;
            $attributes[$column] = $this->$column;
        }

        return $attributes;
    }

    // Sanitize attributes
    public function sanitizeAttributes() {

        $attributes = $this->attributes();
        $sanitized = [];

        foreach($attributes as $key => $value ) {
            $sanitized[$key] = self::$db->escape_string($value);
        }

        return $sanitized;
    }

    // Synchronize an array with the object
    public function sync($args=[]) { 

        foreach($args as $key => $value) {
            if(property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }
}