<?php

// This class is focussed on dealing with queries for one type of data
// That allows for easier re-using and it's rather easy to find all your queries
// This technique is called the repository pattern
class CardRepository
{
    private DatabaseManager $databaseManager;

    // This class needs a database connection to function
    public function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;
    }

    public function create(string $name, string $type): void
    {
        $sqlQuery = 'INSERT INTO types (name, type) VALUES (:name, :type)';
        $statement = $this->databaseManager->connection->prepare($sqlQuery);
        $statement->execute([
            ':name' => $name,
            ':type' => $type
        ]);
    }

    // Get one
    public function find(int $id): array
    {
        $sqlQuery = 'SELECT * FROM types WHERE id = :id';
        $statement = $this->databaseManager->connection->prepare($sqlQuery);
        $statement->execute([
            ':id' => $id
        ]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get all
    public function get(): array
    {
        $sqlQuery = 'SELECT * FROM types WHERE is_deleted IS NULL';
        $statement = $this->databaseManager->connection->prepare($sqlQuery);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update(int $id, string $name, string $type): void
    {
        $sqlQuery = 'UPDATE types SET name=:name, type=:type WHERE id = :id';
        $statement = $this->databaseManager->connection->prepare($sqlQuery);
        $statement->execute([
            ':id' => $id,
            ':name' => $name,
            ':type' => $type
        ]);
    }

    public function delete(int $id): void
    {
//        $sqlQuery = 'DELETE FROM types WHERE id = :id';
        $sqlQuery = 'UPDATE types SET is_deleted = 1 WHERE id = :id';
        $statement = $this->databaseManager->connection->prepare($sqlQuery);
        $statement->execute([
            ':id' => $id
        ]);
    }

}