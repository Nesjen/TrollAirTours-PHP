<?php

class CustomerModel {
    /** @var PDO */
    private $dbConn;

    const TABLE = "customer";
    const SELECT_QUERY = "SELECT * FROM " . CustomerModel::TABLE;
    const INSERT_QUERY = "INSERT INTO " . CustomerModel::TABLE . " (name) VALUES (:name)";

    /** @var PDOStatement Statement for selecting all entries */
    private $selStmt;
    /** @var PDOStatement Statement for adding new entries */
    private $addStmt;

    public function __construct(PDO $dbConn) {
        $this->dbConn = $dbConn;
        $this->addStmt = $this->dbConn->prepare(CustomerModel::INSERT_QUERY);
        $this->selStmt = $this->dbConn->prepare(CustomerModel::SELECT_QUERY);
    }

    /**
     * Get all customers stored in the DB
     * @return array in associative form
     */
    public function getAll() {
        // Fetch all customers as associative arrays
        $this->selStmt->execute();
        return $this->selStmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Try to add a new customer
     *
     * @param $name
     *
     * @return bool true on success, false otherwise
     */
    public function add($name) {
        return $this->addStmt->execute(array("name" => $name));
    }

    // TODO - create additional functions for customer model here

}