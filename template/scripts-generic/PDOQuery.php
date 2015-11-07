<?php

/*
 * Executes the SQL query and returns the result. Returns false on error.
 */
function getPDOQueryResult($pdo, $query, $file, $line_number)
{
    try
    {
        $statement = $pdo->query($query);
        if (!$statement) raiseError("Query execution error: <br />", $query, $file, $line_number);
        else return $statement->fetchAll();
    }
    catch(Exception $ex)
    {
        echo getErrorDescription($ex->getMessage(), $query, $file, $line_number);
        return False;
    }
}

/*
 * Executes the parametrized SQL query and returns the result. Returns false on error.
 */
function getPDOParametrizedQueryResult($pdo, $query, $parameters, $file, $line_number)
{
    try
    {
        if (empty($parameters))
        {
            $statement = $pdo->query($query);
        }
        else
        {
            $statement = $pdo->prepare($query);
            $statement->execute($parameters);
        }

        if (!$statement) raiseError("Query execution error: <br />", $query, $file, $line_number);
        else return $statement->fetchAll();
    }
    catch(Exception $ex)
    {
        echo getErrorDescription($ex->getMessage(), $query, $file, $line_number);
        return False;
    }
}

/*
 * Executes the parametrized SQL query and returns the result. Returns false on error.
 */
function getPDOParametrizedQueryScalarValue($pdo, $query, $parameters, $file, $line_number)
{
    try
    {
        if (empty($parameters))
        {
            $statement = $pdo->query($query);
        }
        else
        {
            $statement = $pdo->prepare($query);
            $statement->execute($parameters);
        }

        if (!$statement) raiseError("Query execution error: <br />", $query, $file, $line_number);
        if (empty($statement)) return False;
        else return $statement->fetchColumn();
    }
    catch(Exception $ex)
    {
        echo getErrorDescription($ex->getMessage(), $query, $file, $line_number);
        return False;
    }
}

/*
 * Executes the SQL query and returns true when success. Returns false otherwise.
 */
function PDOExecQuery($pdo, $query, $file, $line_number, $return_rows_number = False)
{
    try
    {
        $rows_number = $pdo->exec($query);

        if ($return_rows_number) return $rows_number;
        else return True;
    }
    catch(Exception $ex)
    {
        echo getErrorDescription($ex->getMessage(), $query, $file, $line_number);
        return False;
    }
}

/*
 * Executes the parametrized SQL query and returns true when success. Returns false otherwise.
 * If $return_rows_number is True, function returns affected rows number.
 */
function PDOExecParametrizedQuery($pdo, $query, $parameters, $file, $line_number, $return_rows_number = False)
{
    try
    {
        if (empty($parameters))
        {
            $rows_number = $pdo->exec($query);
        }
        else
        {
            $statement = $pdo->prepare($query);
            $statement->execute($parameters);
            if (!$statement) raiseError("Query execution error: <br />", $query, $file, $line_number);
            $rows_number = $statement->rowCount();
        }

        if ($return_rows_number) return $rows_number;
        else return True;
    }
    catch(Exception $ex)
    {
        echo getErrorDescription($ex->getMessage(), $query, $file, $line_number);
        return False;
    }
}

/**
 *
 * @return True when SQL query returns empty result set. False otherwise.
 */
function PDOcheckEmptyQuery($pdo, $query, $file, $line_number, $parameters = NULL)
{
    try
    {
        if ((empty($parameters) || $parameters === NULL))
        {
            $result = getPDOQueryResult($pdo, $query, $file, $line_number);
        }
        else
        {
            $result = getPDOParametrizedQueryResult($pdo, $query, $parameters, $file, $line_number);
        }
        
        if (count($result) == 0) return True;
        else return False;
    }
    catch(Exception $ex)
    {
        echo getErrorDescription($ex->getMessage(), $query, $file, $line_number);
        return False;
    }
}

/**
 * echo the error prettier
 */
function getErrorDescription($error, $query, $file, $line_number)
{
    return "<br />
        <b>$error</b><br />
        <b>query:</b> $query<br />
        in <b>$file</b> on line <b>$line_number</b><br />";
}

/**
 * raises the error and prints it pretty
 */
function raiseError($error, $query, $file, $line_number)
{
    throw new Exception(getErrorDescription($error, $query, $file, $line_number));
}