<?php

class Profesi extends DB
{
    function getProfesi()
    {
        $query = "SELECT * FROM profesi";
        return $this->execute($query);
    }

    function getProfesiById($id)
    {
        $query = "SELECT * FROM profesi WHERE id_profesi=$id";
        return $this->execute($query);
    }

    function addProfesi($data)
    {
        $nama = $data['nama'];
        $query = "INSERT INTO Profesi VALUES('', '$nama')";
        return $this->executeAffected($query);
    }

    function updateProfesi($id, $data)
    {
        $nama = $data['nama'];
        $query = "UPDATE profesi SET nama_profesi='$nama' WHERE id_profesi='$id'";
        return $this->executeAffected($query);
    }

    function deleteProfesi($id)
    {
        $query = "DELETE FROM profesi WHERE id_profesi='$id'";
        return $this->executeAffected($query);
    }

    function searchProfesi($keyword)
    {
        // ...
        $query = "SELECT * FROM profesi WHERE nama_profesi LIKE '%$keyword%';";

        return $this->execute($query);
    }

    function sortProfesi($keyword) 
    {
        $sql = "SELECT * FROM profesi ORDER BY $keyword";
        return $this->execute($sql);
    }
}
