<?php

namespace App\Util;

class AppUtil {
    
    public static function getVanityStats() {
        $connection = \Cake\Datasource\ConnectionManager::get('default');
        
        // STATS
        //$stats = $this->Session->read('App.stats');
        //if(!$stats) {
        $doneSQL = "SELECT COUNT( DISTINCT travels.id ) AS hires, SUM( travels.people_count ) AS people
                    FROM travels
                    INNER JOIN users ON travels.user_id = users.id
                    AND users.role !=  'admin'
                    AND users.role !=  'tester'
                    INNER JOIN conversations ON travels.id = conversations.travel_id
                    INNER JOIN conversations_meta ON conversations.id = conversations_meta.conversation_id
                    AND (
                    conversations_meta.state = 'D'
                    OR conversations_meta.state = 'P'
                    )";

        $reviewsSQL = "SELECT COUNT( testimonials.id ) AS reviews
                    FROM testimonials
                    WHERE testimonials.state = 'A'";

        $done = $results = $connection->execute($doneSQL)->fetchAll('assoc');
        $reviews = $connection->execute($reviewsSQL)->fetchAll('assoc');

        $stats = array('hires'=>$done[0]['hires'], 'people'=>$done[0]['people'], 'reviews'=>$reviews[0]['reviews']);
        //}
            
        // Cache this query   
        
        return $stats;
    }
    
    public static function getReviewsSample($testimonialsCount = 3) {
        $TestimonialsTable = \Cake\ORM\TableRegistry::getTableLocator()->get('Testimonials');

        $lang = \Cake\Core\Configure::read('App.language');
        $conditions = array('Testimonials.use_as_sample'=>true, 'Testimonials.lang'=>$lang, 'Testimonials.image_filepath IS NOT NULL', 'Testimonials.image_filepath !='=>'');

        //$testimonials_sample = $TestimonialsTable->find('all', array('conditions'=>$conditions, 'order'=>array('Testimonials.created'=>'DESC'), 'limit'=>$testimonialsCount));
        
        $testimonials_sample = $TestimonialsTable->find()
                ->contain(\App\Model\Entity\Testimonial::$basicContain)
                ->where($conditions)
                ->order(array('Testimonials.created'=>'DESC'))
                ->limit($testimonialsCount);
        
        $count = $testimonials_sample->count();
        
        // Si no se encontraron suficientes como ejemplos, coger de los featured
        if($count < $testimonialsCount) {
            $conditions['Testimonials.use_as_sample'] = false;
            $conditions['Testimonials.featured'] = true;
            
            $testimonials_sample = $testimonials_sample->append(
                    $TestimonialsTable->find()
                        ->contain(\App\Model\Entity\Testimonial::$basicContain)
                        ->where($conditions)
                        ->order(array('Testimonials.created'=>'DESC'))
                        ->limit($testimonialsCount - $count)
                    );  
        }

        return $testimonials_sample;
    }
}