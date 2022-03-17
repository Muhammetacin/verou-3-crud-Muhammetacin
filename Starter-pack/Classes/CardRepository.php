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
        $sqlQuery = 'INSERT INTO types (name, type, created_at) VALUES (:name, :type, NOW())';
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
        $sqlQuery = 'UPDATE types SET name=:name, type=:type, updated_at=NOW() WHERE id = :id';
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

    public function getFiltered(array $types): array
    {
        if(count($types) === 0) {
            return $this->get();
        }

        if(count($types) === 1) {
            $sqlQuery = 'SELECT * FROM types WHERE type = :type';
            $statement = $this->databaseManager->connection->prepare($sqlQuery);
            $statement->execute([
                ':type' => $types[0]
            ]);
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        if(count($types) >= 2) {
            $sqlQuery = 'SELECT * FROM types WHERE type != NULL';

            while (count($types) > 0) {
                $sqlQuery .= ' OR type = \'' . $types[0] . '\'';
                array_shift($types);
            }
            $statement = $this->databaseManager->connection->prepare($sqlQuery);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        return [];
    }
}