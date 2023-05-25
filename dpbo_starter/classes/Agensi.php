<?php

class Agensi extends DB
{
    function getAgensi()
    {
        $query = "SELECT * FROM agensi";
        return $this->execute($query);
    }

    function getAgensiById($id)
    {
        $query = "SELECT * FROM agensi WHERE id_agensi=$id";
        return $this->execute($query);
    }

    function addAgensi($data)
    {
        $nama = $data['nama'];
        $query = "INSERT INTO agensi VALUES('', '$nama')";
        return $this->executeAffected($query);
    }

    function updateAgensi($id, $data)
    {
        $nama = $data['nama'];
        $query = "UPDATE agensi SET nama_agensi='$nama' WHERE id_agensi='$id'";
        return $this->executeAffected($query);
    }

    function deleteAgensi($id)
    {
        $query = "DELETE FROM agensi WHERE id_agensi='$id'";
        return $this->executeAffected($query);
    }

    function searchAgensi($keyword)
    {
        // ...
        $query = "SELECT * FROM agensi WHERE nama_agensi LIKE '%$keyword%';";

        return $this->execute($query);
    }

    function sortAgensi($keyword) 
    {
        $sql = "SELECT * FROM agensi ORDER BY $keyword";
        return $this->execute($sql);
    }
}
