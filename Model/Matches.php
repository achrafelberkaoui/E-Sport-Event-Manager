<?php 
include_once "./bd/config.php";
include_once "./interfaces/archirvable.php";
    class Matches{
        public static function setResult(PDO $con,$s1, $s2, $Match_id)
        {
            $stm = $con->prepare("SELECT EquipeA, EquipeB FROM matches WHERE id = ?");
            $stm->execute([$Match_id]);
            $MATCH = $stm->fetch(PDO::FETCH_ASSOC);

            if(!$MATCH){
            echo "Match introuvable\n";
            return;
            }
            
            $EquipeA = $MATCH['EquipeA'];
            $EquipeB = $MATCH['EquipeB'];
            if($s1 == $s2){
                $gagnet = NULL;
            }else{
                $gagnet = ($s1 > $s2) ? $EquipeA : $EquipeB ;
            }
            $stmt = $con->prepare (
                "UPDATE matches SET Score_A = ?, Score_B = ?, GagnantID = ? WHERE id = ?"
            );
            $stmt->execute([$s1, $s2, $gagnet, $Match_id]);
        }
    }

    class MatchGenerator implements Archivable{

        public static function generate(PDO $con, $tournoiId)
        {
            $equipes = $con->query("SELECT id FROM equipe")->fetchAll(PDO::FETCH_COLUMN);

            for($i=0; $i < count($equipes); $i+=2){
                if(isset($equipes[$i+1])){
                    $stmt = $con->prepare("insert into matches(EquipeA, EquipeB, TournoiID, Score_A, Score_B, GagnantID)
                                                               VALUES(?,?,?,0,0,NULL)");
                    $stmt->execute([$equipes[$i], $equipes[$i+1], $tournoiId]);
                }
            }

        }
        public function archive (){
            echo "match archive";
        }
    }

    class AffichageMatch{
        public static function affich (PDO $con){
            $stmt = $con->query("SELECT m.id, e1.Name as equipeA, e2.Name as equipeB, m.Score_A, m.Score_B
                FROM matches m
                JOIN equipe e1 ON e1.id = m.EquipeA
                JOIN equipe e2 ON e2.id = m.EquipeB
                GROUP BY m.id
                HAVING(m.Score_A + m.Score_B) > 0");
              return $stmt->fetchAll(PDO::FETCH_ASSOC);
            //   var_dump($Matches);
        }
    }