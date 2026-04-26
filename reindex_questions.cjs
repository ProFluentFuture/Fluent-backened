const fs = require('fs');
const path = 'storage/app/private/lessons/college_level.json';
const data = JSON.parse(fs.readFileSync(path, 'utf8'));

data.days.forEach((day, dIdx) => {
    const dayNum = day.day;
    
    // Day-based prefix: 3 + day (2 digits) + lesson (2 digits)
    day.lessons.forEach((lesson, lIdx) => {
        // We'll keep lessonId in the 3000-5000 range
        const newLessonId = 3000 + (dayNum * 10) + lIdx;
        lesson.lessonId = newLessonId;
        
        lesson.questions.forEach((q, qIdx) => {
            // question id: lessonId * 100 + seq
            q.id = newLessonId * 100 + (qIdx + 1);
        });
    });
    
    if (day.test) {
        // TestId: 4000 + day
        const newTestId = 4000 + dayNum;
        day.test.testId = newTestId;
        day.test.questions.forEach((q, qIdx) => {
            // question id: testId * 100 + seq
            q.id = newTestId * 100 + (qIdx + 1);
        });
    }
});

fs.writeFileSync(path, JSON.stringify(data, null, 4));
console.log('Successfully re-indexed all question, lesson, and test IDs.');
