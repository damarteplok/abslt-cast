<?php


namespace Absltcast\Entities;

use Redis;
use Absltcast\Lesson;
use Absltcast\Series;

trait Learning {

	public function completeLesson($lesson)
    {
        Redis::sadd("user:{$this->id}:series:{$lesson->series->id}", $lesson->id);
    }

    public function percentageCompletedForSeries($series)
    {
        $numberOfLessonsInSeries = $series->lessons->count();
        $numberOfCompletedLessons = $this->getNumberOfCompletedLessonsForASeries($series);  

        return ($numberOfCompletedLessons / $numberOfLessonsInSeries) * 100;

    }

    public function getNumberOfCompletedLessonsForASeries($series)
    {
        return count($this->getCompletedLessonsForASeries($series));
    }

    public function getCompletedLessonsForASeries($series)
    {
    	return Redis::smembers("user:{$this->id}:series:{$series->id}");
    }

    public function hasStartedSeries($series)

    {
    	return $this->getNumberOfCompletedLessonsForASeries($series) > 0;
    }

    public function getCompletedLessons($series)
    {
    	$completedLessons = $this->getCompletedLessonsForASeries($series);

    	return collect($completedLessons)->map(function($lessonId) {
    		return Lesson::find($lessonId);
    	});
    }

    public function hasCompletedLesson($lesson)
    {
        return in_array(
            $lesson->id,
            $this->getCompletedLessonsForASeries($lesson->series)

        );
    }
    public function seriesBeingWatchedIds()
    {
        $keys = Redis::keys("user:{$this->id}:series:*");
        $seriesIds = [];
        foreach($keys as $key):
            $seriesId = explode(':', $key)[3];
            array_push($seriesIds, $seriesId);
        endforeach;

        return $seriesIds;
    }

    public function seriesBeingWatched()
    {
       return collect($this->seriesBeingWatchedIds())->map(function($id){
            return Series::find($id);
        })->filter();

    }

    public function getTotalNumberOfCompletedLessons()
    {
        $keys = Redis::keys("user:{$this->id}:series:*");
        $result = 0;

        foreach($keys as $key):
            $result = $result + count(Redis::smembers($key));
        endforeach;

        return $result;
    }

    public function getNextLessonToWatch($series)
    {
        $lessonIds = $this->getCompletedLessonsForASeries($series);
        $lessonId = end($lessonIds);
        return Lesson::find($lessonId)->getNextLesson();
    }

}