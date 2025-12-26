<?php 
    class Matches{
        public static function setResult(PDO $con,$s1, $s2, $Match_id)
        {
            $gagnet = ($s1 > $s2) ? 1 : 2 ;
            $stmt = $con->prepare (
                "UPDATE matches SET Score_A = ?, Score_B = ?, GagnantID = ? WHERE id = ?"
            );
            $stmt->execute([$s1, $s2, $GagnantID, $Match_id]);
        }
    }