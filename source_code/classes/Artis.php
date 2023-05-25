<?php

class Artis extends DB
{
    function getArtisJoin()
    {
        $query = "SELECT * FROM artis JOIN profesi ON artis.id_profesi=profesi.id_profesi JOIN agensi ON artis.id_agensi=agensi.id_agensi ORDER BY artis.id_artis";

        return $this->execute($query);
    }

    function getArtis()
    {
        $query = "SELECT * FROM artis";
        return $this->execute($query);
    }

    function getArtisById($id)
    {
        $query = "SELECT * FROM artis JOIN profesi ON artis.id_profesi=profesi.id_profesi JOIN agensi ON artis.id_agensi=agensi.id_agensi WHERE id_artis=$id";
        return $this->execute($query);
    }

    function searchArtis($keyword)
    {
        // ...
        $query = "SELECT * FROM artis JOIN profesi ON artis.id_profesi=profesi.id_profesi JOIN agensi ON artis.id_agensi=agensi.id_agensi WHERE
        nama LIKE '%$keyword%' OR
        status_karir LIKE '%$keyword%' OR
        tahun_debut LIKE '%$keyword%' OR 
        nama_profesi LIKE '$keyword' OR
        nama_agensi LIKE '%$keyword%';";

        return $this->execute($query);
    }

    function addData($data, $file)
    {
        $image = $file['image']['name'];
        $photoNameTmp = $file['image']['tmp_name'];
        $destination = 'assets/images/' . $image;

        if(!move_uploaded_file($photoNameTmp, $destination)){
            $image = 'noPhoto.png';
        }

        $name = $data['nama'];
        $status = $data['status_karir'];
        $thnDebut = $data['tahun_debut'];
        $id_profesi = $data['id_profesi'];
        $id_agensi = $data['id_agensi'];

        $sql = "INSERT INTO artis VALUES (NULL, '$image', '$name', '$status', '$thnDebut', '$id_profesi', '$id_agensi')";

        return $this->executeAffected($sql);
    }

    function updateData($id, $data, $file)
    {
        $image = $file['image']['name'];
        $photoNameTmp = $file['image']['tmp_name'];
        $destination = 'assets/images/' . $image;

        if(!move_uploaded_file($photoNameTmp, $destination)){
            $image = 'noPhoto.png';
        }
        
        $name = $data['nama'];
        $status = $data['status_karir'];
        $thnDebut = $data['tahun_debut'];
        $id_profesi = $data['id_profesi'];
        $id_agensi = $data['id_agensi'];
        
        $sql = "UPDATE artis SET image='$image', nama='$name', status_karir='$status', tahun_debut='$thnDebut', id_profesi='$id_profesi', id_agensi='$id_agensi' WHERE id_artis='$id'";
        return $this->executeAffected($sql);
    }

    function deleteData($id)
    {
        $sql = "DELETE FROM artis WHERE id_artis='$id'";
        return $this->executeAffected($sql);
    }

    function sortArtis($keyword)
    {
        $sql = "SELECT * FROM artis JOIN profesi ON artis.id_profesi=profesi.id_profesi JOIN agensi ON artis.id_agensi=agensi.id_agensi ORDER BY $keyword";
        return $this->execute($sql);
    }
}

