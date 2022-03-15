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

    public function create(string $name): bool
    {
        $sqlQuery = 'INSERT INTO types (name) VALUES (:name)';

        $statement = $this->databaseManager->connection->prepare($sqlQuery);
        $statement->execute([
            ':name' => $name
        ]);

        return $this->databaseManager->connection->lastInsertId();
    }

    // Get one
    public function find(int $id): array
    {
        $sqlQuery = 'SELECT * FROM types WHERE id = ' . $id;
        $statement = $this->databaseManager->connection->prepare($sqlQuery);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get all
    public function get(): array
    {
        $sqlQuery = 'SELECT * FROM types';
        $statement = $this->databaseManager->connection->prepare($sqlQuery);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $name): void
    {
        $sqlQuery = 'UPDATE types SET name=' . $name . ' WHERE id = '. $id;
    }

    public function delete(int $id): void
    {
        $sqlQuery = 'DELETE FROM types WHERE id = :id';
        $statement = $this->databaseManager->connection->prepare($sqlQuery);
        $statement->execute([
            ':id' => $id
        ]);
    }

}