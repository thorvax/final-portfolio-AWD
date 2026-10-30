import { useEffect, useRef, useState } from 'react';
import AboutSection from '@/components/portfolio/about-section';
import ContactSection from '@/components/portfolio/contact-section';
import EducationItem from '@/components/portfolio/education-item';
import Footer from '@/components/portfolio/footer';
import HeroSection from '@/components/portfolio/hero-section';
import Navbar from '@/components/portfolio/navbar';
import ProjectCard from '@/components/portfolio/project-card';
import SectionTitle from '@/components/portfolio/section-title';
import SkillCard from '@/components/portfolio/skill-card';

const technicalSkills = [
    'Java',
    'C++',
    'PHP',
    'Java Swing',
    'Database management',
    'UI/UX fundamentals',
    'HTML and Tailwind CSS',
    'Vanilla JavaScript',
    'Basic microcontroller programming',
    'Basic API integration',
    'SketchUp',
    'Basic 3D modellig and animation',
    'Basic network troubleshooting',
];

const workStyle = [
    'Problem solving',
    'Curiosity',
    'Creativity',
    'Continuous learning',
    'Attention to detail',
];

const projects = [
    {
        title: 'Space Eater Background Program',
        description:
            'A C++ background application that launches automatically on startup and runs quietly outside the taskbar.',
        tools: ['C++', 'File handling', 'System operations'],
        image: '/assets/images/projects/space_eater.png',
        imageAlt: 'Space Eater C++ project artwork',
    },
    {
        title: 'Vending Machine System',
        description:
            'A Java desktop application that simulates a vending machine with a graphical interface and object-oriented design.',
        tools: ['Java', 'Swing UI', 'OOP'],
        image: '/assets/images/projects/vending_machine.png',
        imageAlt: 'Vending Machine System project artwork',
    },
    {
        title: 'Personal Portfolio Website',
        description:
            'A responsive portfolio that presents my profile, skills, coursework projects, and contact information.',
        tools: ['HTML', 'Tailwind CSS', 'Vanilla JavaScript'],
        image: '/assets/images/projects/portfolio-preview.svg',
        imageAlt: 'Original illustration of this portfolio website',
    },
];

export default function Home() {
    const [isMenuOpen, setIsMenuOpen] = useState(false);
    const [tagline, setTagline] = useState('');
    const [fact, setFact] = useState('');
    const factTimer = useRef<ReturnType<typeof setInterval> | null>(null);

    useEffect(() => {
        const text = 'Hi, I am Marc Whesley!';
        let index = 0;
        const timer = setInterval(() => {
            index += 1;
            setTagline(text.slice(0, index));

            if (index >= text.length) {
                clearInterval(timer);
            }
        }, 80);

        return () => clearInterval(timer);
    }, []);

    useEffect(() => {
        return () => {
            if (factTimer.current !== null) {
                clearInterval(factTimer.current);
            }
        };
    }, []);

    function showRandomFact() {
        const facts = [
            'I debug with console.log and prayers.',
            'One small change, twelve new bugs.',
            'It works on my machine.',
            'Powered by coffee and questionable commits.',
            'My code has two moods: almost working and mysteriously broken.',
            'I call it a feature until the bug report arrives.',
            'Works perfectly, as long as nobody touches it.',
        ];
        const text = facts[Math.floor(Math.random() * facts.length)];

        if (factTimer.current !== null) {
            clearInterval(factTimer.current);
        }

        setFact('');
        let index = 0;
        factTimer.current = setInterval(() => {
            index += 1;
            setFact(text.slice(0, index));

            if (index >= text.length && factTimer.current !== null) {
                clearInterval(factTimer.current);
                factTimer.current = null;
            }
        }, 15);
    }

    return (
        <div className="
    min-h-screen
    bg-fixed
    bg-gradient-to-br
    from-indigo-950
    via-indigo-950
    to-cyan-900
    text-slate-100
    selection:bg-cyan-300
    selection:text-slate-950
  ">
            <a href="#main-content" className="
      sr-only
      rounded
      bg-cyan-300
      px-4
      py-2
      text-slate-950
      focus:not-sr-only
      focus:fixed
      focus:left-4
      focus:top-4
      focus:z-50
    ">Skip to content</a>

            <Navbar tagline={tagline} isMenuOpen={isMenuOpen} setIsMenuOpen={setIsMenuOpen} />

            <main id="main-content" className="
      mx-auto
      max-w-6xl
      px-5
    ">
                <HeroSection />
                <AboutSection fact={fact} onShowFact={showRandomFact} />

                <section id="skills" className="
        scroll-mt-28
        border-t
        border-white/10
        py-16
        sm:py-20
      ">
                    <SectionTitle
                        eyebrow="What I work with"
                        title="Skills"
                        description="A growing mix of programming, interface design, and database skills. These labels describe areas I have practiced; they are not percentage ratings."
                    />
                    <div className="
          grid
          gap-6
          md:grid-cols-2

          [&>article]:rounded-2xl
          [&>article]:border
          [&>article]:border-white/10
          [&>article]:bg-slate-900/70
          [&>article]:p-6

          [&>article>h3]:text-lg
          [&>article>h3]:font-semibold
          [&>article>h3]:text-white

          [&>article>ul]:mt-4
          [&>article>ul]:flex
          [&>article>ul]:flex-wrap
          [&>article>ul]:gap-2

          [&>article>ul>li]:rounded-lg
          [&>article>ul>li]:bg-slate-800
          [&>article>ul>li]:px-3
          [&>article>ul>li]:py-2
          [&>article>ul>li]:text-sm
          [&>article>ul>li]:text-slate-200
        ">
                        <SkillCard title="Technical skills" items={technicalSkills} />
                        <SkillCard title="Ways I work" items={workStyle} />
                    </div>
                </section>

                <section id="projects" className="
        scroll-mt-28
        border-t
        border-white/10
        py-16
        sm:py-20
      ">
                    <SectionTitle
                        eyebrow="Selected work"
                        title="Projects"
                        description="A few examples of what I have built and what I am learning."
                    />
                    <div className="
          grid
          gap-6
          md:grid-cols-2
          lg:grid-cols-3

          [&>article]:overflow-hidden
          [&>article]:rounded-2xl
          [&>article]:border
          [&>article]:border-white/10
          [&>article]:bg-slate-900/70
          [&>article]:transition

          [&>article:hover]:-translate-y-1
          [&>article:hover]:border-cyan-300/50

          [&>article>img]:aspect-[16/10]
          [&>article>img]:w-full
          [&>article>img]:object-cover

          [&>article>div]:p-5

          [&>article>div>h3]:text-xl
          [&>article>div>h3]:font-semibold
          [&>article>div>h3]:text-white

          [&>article>div>p]:mt-3
          [&>article>div>p]:leading-6
          [&>article>div>p]:text-slate-300

          [&>article>div>ul]:mt-4
          [&>article>div>ul]:flex
          [&>article>div>ul]:flex-wrap
          [&>article>div>ul]:gap-2

          [&>article>div>ul>li]:rounded-full
          [&>article>div>ul>li]:bg-cyan-300/10
          [&>article>div>ul>li]:px-3
          [&>article>div>ul>li]:py-1
          [&>article>div>ul>li]:text-xs
          [&>article>div>ul>li]:text-cyan-100
        ">
                        {projects.map((project) => (
                            <ProjectCard key={project.title} {...project} />
                        ))}
                    </div>
                </section>

                <section id="education" className="
        scroll-mt-28
        border-t
        border-white/10
        py-16
        sm:py-20
      ">
                    <SectionTitle eyebrow="Learning journey" title="Education & Experience" />
                    <ol className="
          ml-2
          border-l
          border-cyan-300/40
        ">
                        <EducationItem
                            label="Coursework"
                            title="Advanced Web Development"
                            subtitle="IT ELEC01"
                            description="Learning to plan, build, and review responsive websites using HTML, Tailwind CSS, and vanilla JavaScript."
                        />
                    </ol>
                </section>

                <ContactSection />
            </main>

            <Footer />
        </div>
    );
}
