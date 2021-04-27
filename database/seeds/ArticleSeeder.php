<?php

use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articles = [
            [
                'title' => 'Motivation is a key factor in whether students cheat',
                'description' => "Ever since the COVID-19 pandemic caused many U.S. colleges to shift to remote learning in the spring of 2020, student cheating has been a concern for instructors and students alike.

                To detect student cheating, considerable resources have been devoted to using technology to monitor students online. This online surveillance has increased students’ anxiety and distress. For instance, some students have indicated the monitoring technology required them to stay at their desks or risk being labeled as cheaters.
                
                Although relying on electronic eyes may partially curb cheating, there’s another factor in the reasons students cheat that often gets overlooked – student motivation.
                
                As a team of researchers in educational psychology and higher education, we became interested in how students’ motivation to learn, or what drives them to want to succeed in class, affects how much they cheated in their schoolwork.
                
                To shine light on why students cheat, we conducted an analysis of 79 research studies and published our findings in the journal Educational Psychology Review. We determined that a variety of motivational factors, ranging from a desire for good grades to a student’s academic confidence, come into play when explaining why students cheat. With these factors in mind, we see a number of things that both students and instructors can do to harness the power of motivation as a way to combat cheating, whether in virtual or in-person classrooms. Here are five takeaways:
                
                1. Avoid emphasizing grades
                Although obtaining straight A’s is quite appealing, the more students are focused solely on earning high grades, the more likely they are to cheat. When the grade itself becomes the goal, cheating can serve as a way to achieve this goal.
                
                Students’ desire to learn can diminish when instructors overly emphasize high test scores, beating the curve, and student rankings. Graded assessments have a role to play, but so does acquisition of skills and actually learning the content, not only doing what it takes to get good grades.
                
                2. Focus on expertise and mastery
                Striving to increase one’s knowledge and improve skills in a course was associated with less cheating. This suggests that the more students are motivated to gain expertise, the less likely they are to cheat. Instructors can teach with a focus on mastery, such as providing additional opportunities for students to redo assignments or exams. This reinforces the goal of personal growth and improvement.
                
                3. Combat boredom with relevance
                Compared with students motivated by either gaining rewards or expertise, there might be a group of students who are simply not motivated at all, or experiencing what researchers call amotivation. Nothing in their environment or within themselves motivates them to learn. For these students, cheating is quite common and seen as a viable pathway to complete coursework successfully rather than putting forth their own effort. However, when students find relevance in what they’re learning, they are less likely to cheat.
                
                When students see connections between their coursework and other courses, fields of study or their future careers, it can stimulate them to see how valuable the subject might be. Instructors can be intentional in providing rationales for why learning a particular topic might be useful and connecting students’ interest to the course content.
                
                4. Encourage ownership of learning
                When students struggle, they sometimes blame circumstances beyond their control, such as believing their instructor to have unrealistic standards. Our findings show that when students believe they are responsible for their own learning, they are less likely to cheat.
                
                Encouraging students to take ownership over their learning and put in the required effort can decrease academic dishonesty. Also, providing meaningful choices can help students feel they are in charge of their own learning journey, rather than being told what to do.
                
                Schoolgirl sitting at desk feels happy after receiving great news
                Building confidence in students is a good approach toward reducing academic dishonesty. fizkes/iStock via Getty Images Plus
                5. Build confidence
                Our study found that when students believed they could succeed in their coursework, cheating decreased. When students do not believe they will be successful, a teaching approach called scaffolding is key. Essentially, the scaffolding approach involves assigning tasks that match the students’ ability level and gradually increase in difficulty. This progression slowly builds students’ confidence to take on new challenges. And when students feel confident to learn, they are willing to put in more effort in school.
                
                An inexpensive solution
                With these tips in mind, we expect cheating might pose less of a threat during the pandemic and beyond. Focusing on student motivation is a much less controversial and inexpensive solution to curtail any tendencies students may have to cheat their way through school.
                
                Are these motivational strategies the cure-all to cheating? Not necessarily. But they are worth considering – along with other strategies – to fight against academic dishonesty.",
                'user_id' => 1
            ],
            [
                'title' => 'Howard Students Protest Cut of Classics Department, Hub for Black Scholarship',
                'description' => "As an alumna of Howard University, Anika Prather remembers feeling that the classics were everywhere during her years as a student. No matter your major or field of study, she recalled, it was practically a given that classics would be woven into your educational experience.

                “My brother was a pre-med student — we both went to Howard — and I remember sitting there seeing him read all types of classics, like we all had to, classics or some work of the canon, but then you’re reading it from a Black perspective,” Dr. Prather said. “It’s really incredible.”
                
                At Howard, the classics department is as old as the university itself. Established in 1867 — the same year that Howard, one of the country’s leading historically Black colleges and universities, was founded — the department became a hub for Black thought, enlightening generations of students about Black people in antiquity.
                
                Dr. Prather, now an adjunct professor of humanities, takes pride in being a part of the department. But she will soon have to leave the position, as the university plans to dissolve the department by the fall semester.
                
                The university’s decision, which was reported in The Washington Post, has galvanized students and faculty members to preserve what the Society for Classical Studies says is the only classics department at an H.B.C.U.",
                'user_id' => 1
            ],
            [
                'title' => "The World Might Be Better Off Without College for Everyone",
                'description' => "I have been in school for more than 40 years. First preschool, kindergarten, elementary school, junior high, and high school. Then a bachelor’s degree at UC Berkeley, followed by a doctoral program at Princeton. The next step was what you could call my first “real” job—as an economics professor at George Mason University.
                
                Thanks to tenure, I have a dream job for life. Personally, I have no reason to lash out at our system of higher education. Yet a lifetime of experience, plus a quarter century of reading and reflection, has convinced me that it is a big waste of time and money. When politicians vow to send more Americans to college, I can’t help gasping, “Why? You want us to waste even more?”
                
                How, you may ask, can anyone call higher education wasteful in an age when its financial payoff is greater than ever? The earnings premium for college graduates has rocketed to 73 percent—that is, those with a bachelor’s degree earn, on average, 73 percent more than those who have only a high-school diploma, up from about 50 percent in the late 1970s. The key issue, however, isn’t whether college pays, but why. The simple, popular answer is that schools teach students useful job skills. But this dodges puzzling questions.
                
                First and foremost: From kindergarten on, students spend thousands of hours studying subjects irrelevant to the modern labor market. Why do English classes focus on literature and poetry instead of business and technical writing? Why do advanced-math classes bother with proofs almost no student can follow? When will the typical student use history? Trigonometry? Art? Music? Physics? Latin? The class clown who snarks “What does this have to do with real life?” is onto something.",
                'user_id' => 1
            ],
            [
                'title' => 'Remote education is rife with threats to student privacy',
                'description' => "An online “proctor” who can survey a student’s home and manipulate the mouse on their computer as the student takes an exam. A remote-learning platform that takes face scans and voiceprints of students. Virtual classrooms where strangers can pop up out of the blue and see who’s in class.

                These three unnerving scenarios are not hypothetical. Rather, they stand as stark, real-life examples of how remote learning during the pandemic – both at the K-12 and college level – has become riddled with threats to students’ privacy.
                
                As a scholar of privacy, I believe all the electronic eyes watching students these days have created privacy concerns that merit more attention.
                
                Which is why, increasingly, you will see aggrieved students, parents and digital privacy advocates seeking to hold schools and technology platforms accountable for running afoul of student privacy law.",
                'user_id' => 1
            ],
            [
                'title' => 'Student housing is scarce for college students who have kids',
                'description' => "Before the family housing program opened at his university, Blake and his two young daughters were couch-surfing at the homes of their friends and family.

                “They only saw me coming and going,” Blake explains, describing how he had to juggle a job at a local casino, college classes and parenting as a single homeless dad pursuing a career in nursing.
                
                When the university opened its family housing program in 2014, Blake and his daughters were among the first to move in. Living on campus changed their lives. The girls claimed a place within the college community. They made friends with people across campus, ate with their dad in the dining hall and did homework together as a family. And Blake was able to better focus on his studies.
                
                The program – which has since been discontinued – is a rarity in higher education.
                
                According to a Campus Family Housing Database that I created with my colleague, Sarah Galison, just 8% of all U.S. colleges and universities offer on-campus housing for college students who are parents. This does not take into consideration whether the housing is affordable, or the number, size or availability of family housing units. Furthermore, we found that 28 institutions closed their family housing programs between 2014 and 2019, many without announcement.
                
                This scarcity of student housing poses a serious dilemma for the nearly 4 million undergraduate college students in the United States – or more than one out of every five – who are parents.
                
                I am a sociologist with expertise in housing issues for student parents. I worked with the program that helped Blake and his daughters as part of an effort to replicate a national program that promoted comprehensive support for single parents. That comprehensive support included safe and affordable housing. My job was to serve as a consultant, provide technical assistance and evaluate the program from 2013 through 2017.",
                'user_id' => 1
            ],
            [
                'title' => 'Outdoor classes hold promise for in-person learning amid COVID-19',
                'description' => "When it comes to conducting classes this fall, most colleges seem to be stuck between holding in-person or remote classes, or some combination of the two. As a researcher who focuses on the design of educational spaces, I believe there’s a fourth option that’s not being given its due: outdoor spaces, such as open-air tents.

                From a learning space design perspective, this could be an effective way of maintaining in-person instruction, even when temperatures drop later in the fall.
                
                A few universities are taking class meetings outside as an innovative way to safely keep students on campus.
                
                For instance, Rice University in Houston, Texas, Amherst College a small liberal arts college in Amherst, Massachusetts, and Eckerd College in St. Petersburg, Florida, are among those who have committed to using outdoor classroom spaces to mitigate the risk of viral spread.
                
                These institutions are not looking to merely hold classes outside on nice days, but to find solutions to support regular class meetings outside even in cooler weather. These innovative outdoor learning options might have a future on the other side of the current pandemic.",
                'user_id' => 1
            ],
            [
                'title' => 'Not every campus is a political battlefield',
                'description' => "As the House Intelligence Committee impeachment hearings were livestreamed from Capitol Hill, a group of students at the University of Florida launched an attempt to impeach their student body president for his role in bringing President Donald Trump’s eldest son to speak on their campus.

                Earlier this semester, Harvard students protesting President Trump’s immigration policy criticized reporters from the student newspaper, The Crimson, for contacting ICE – U.S. Immigration and Customs Enforcement – for comment, following standard journalistic practice.
                
                Just a month later at Northwestern University, student journalists, under pressure from their classmates apologized for publishing photos of students protesting against the Trump administration’s immigration policies.
                
                In the past few years, it has been common to see media reports such as these that highlight sensational incidents of political conflicts on American college campuses.
                
                But are headlines and anecdotal reports telling the real story?
                
                As scholars of religion and politics, we wanted to get a larger perspective. So we conducted detailed surveys of representative samples of American college students at five selective U.S. universities, including both public and private schools in the Northeast, the Midwest and the South, collecting data from over 5,600 students.
                
                In our new report, “Politics on the Quad,” we find that the way students describe the political climate on their campus often differs dramatically from what the public sees in headlines and via social media.",
                'user_id' => 2
            ],
            [
                'title' => 'Are you mentally well enough for college?',
                'description' => "Last spring an 18-year-old college freshman who got straight A’s in high school – but was now failing several courses – came to my office on the campus where I work as a psychologist.

                The student was seeking a medical exception so that he could withdraw from the classes he failed instead of taking the F’s and dragging down his GPA.
                
                I evaluated the student and determined – based on information from prior visits – that the student was depressed. This condition was zapping the student’s motivation and energy. Consequently, the student missed classes, didn’t study much and ultimately did poorly in class. I completed a medical exception form to enable the student to withdraw from the classes he failed so that he could keep his GPA from plummeting.
                
                This happens more than you may think. At the end of every semester, I complete dozens of these medical exception forms for students who failed their classes due to mental health reasons.
                
                From my vantage point as a licensed psychologist who has worked in college mental health for a decade, this outcome points to what I believe is a bigger problem in higher education. And that is, at a time when parents and society are putting increased pressure on students to go to college in order to have a successful life, students’ mental health and overall readiness for college – both of which have greatly diminished in recent years – are being overlooked.",
                'user_id' => 2
            ],
            [
                'title' => 'More solutions needed for campus hunger',
                'description' => "A new federal report does a good job of explaining what many researchers have been saying for a decade – food insecurity among college students is a serious national problem.

                As one University of California, Berkeley student revealed in an interview for a 2018 research article I helped write: “Food is always on my mind: ‘Do I have enough money? Maybe I should skip a meal today so I can have enough food for dinner.‘”
                
                However, when it comes to offering up solutions, the new report from the Government Accountability Office comes up short.
                
                My experience as one who has researched campus hunger goes back to 2014, when colleagues and I conducted the first public university system wide survey of campus hunger. We found that over 40 percent of University of California students – about half of all undergraduates and one out of every four graduate students – faced food insecurity. That is more than three times the national household rate of 12 percent. Food security is generally defined as access at all times to enough food for an active, healthy life.
                
                Our findings on campus hunger have been replicated in the University of California system, the California State University system and in colleges throughout the nation.",
                'user_id' => 2
            ],
            [
                'title' => 'Federal funding for higher ed comes with strings attached, but is still worth it',
                'description' => "Public funding cuts in recent years have eroded state support for higher education, triggering tuition increases. As a result, the cost of going to college is rising much faster than income at a time when a college education is becoming increasingly essential for American workers seeking jobs that pay well.

                The federal government, however, funds meaningful research that yields scientific and economic benefits. Thousands of companies have origins in federal research funding, and useful innovations like composite lumber and kidney dialysis machines come directly from federally funded research.
                
                But government support for higher education takes many other forms. It includes federal loans and Pell Grants, as well as funding for research and student-focused programs like TRIO, an outreach program for students from disadvantaged backgrounds.
                
                In exchange for the funding obtained through federal contracts and grants, schools must do specified work and follow detailed rules that govern how to spend these funds and administer the programs that get this funding. For example, funding for McNair Scholars, an initiative to increase student access to graduate-level research, is tied to regulations that govern what kinds of student support are permissible.",
                'user_id' => 2
            ],
            [
                'title' => 'Food scholarships could help more students finish college',
                'description' => "It’s hard, if not impossible, to succeed in college if you’re hungry. Seems like such an easy concept that it’s not worth mentioning.

                But behind that simple concept are some staggering statistics. According to the Wisconsin HOPE Lab, more than 50 percent of community college students nationwide do not have access to healthy and affordable foods.
                
                As a researcher who focuses on poverty, I believe campus hunger is a significant factor behind inequality in college completion rates. And “food scholarships” may be a solution.
                
                Some elected officials have begun to take notice. Last summer, Gov. Jerry Brown of California included US$7.5 million in his budget to develop “hunger-free” college campuses. In December, advocates convened a federal briefing about campus food insecurity on Capitol Hill, where legislators are advancing bills to make it easier for undergraduates to access the Supplemental Nutrition Assistance Program, more commonly known as SNAP.
                
                In January, New York Gov. Andrew Cuomo proposed requiring food pantries on all State University of New York and City University of New York campuses to create a “stigma-free” way to provide students with consistent access to healthy food.
                
                In other states, such as Texas, grassroots efforts are leading the charge. These include a University of Houston and Temple University research project with which I am involved. The project is meant to study the impact of hunger on community college students and look at possible solutions.",
                'user_id' => 2
            ],
            [
                'title' => 'The hefty price of ‘study drug’ misuse on college campuses',
                'description' => "Nonmedical use of Attention Deficit Hyperactivity Disorder (ADHD) drugs on college campuses, such as Adderall, Ritalin, Concerta and Vyvanse, has exploded in the past decade, with a parallel rise in depression disorders and binge drinking among young adults.

                These ADHD drugs act as a brain stimulant that are normally prescribed to individuals who display symptoms of ADHD. These stimulants boost the availability of dopamine, a chemical responsible for transmitting signals between the nerve cells (neurons) of the brain.
                
                But now a growing student population has been using them as “study” drugs – that help them stay up all night and concentrate. According to a 2007 National Institutes of Health (NIH) study, abuse of nonmedical prescription drugs among college students, such as ADHD meds, increased from 8.3 percent in 1996 to 14.6 percent in 2006.
                
                Besides helping with concentration, dopamine is also associated with motivation and pleasurable  feelings. Individuals who use these ADHD drugs nonmedically experience a surge in dopamine similar to that caused by illicit drugs which induces a great sense of well-being.
                
                My journey with investigating the effect of the stimulant use nonmedically on college campuses started with a question from a student seven years ago. The question was about the long-term effect of misuse on brain and physical health. Having an educational background in cell and molecular biology with a concentration in neuroscience, I started a literature review and soon became an educator on the topic to teach students about the effects of such stimulant misuse on the maturing brain.
                
                College students who take ADHD drugs without medical need could risk developing drug dependence as well as a host of mental ailments.",
                'user_id' => 2
            ]
        ];

        foreach($articles as $article){
            Article::create(array_merge($article, [
                'slug' => Str::slug($article['title']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]));
        }
    }
}
