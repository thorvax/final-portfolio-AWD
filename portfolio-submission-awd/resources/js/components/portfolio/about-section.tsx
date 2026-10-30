type AboutSectionProps = {
    fact: string;
    onShowFact: () => void;
};

export default function AboutSection({ fact, onShowFact }: AboutSectionProps) {
    return (
    <section id="about" className="
        scroll-mt-28
        border-t
        border-white/10
        py-16
        sm:py-20
      ">
      <div className="
          grid
          items-center
          gap-10
          md:grid-cols-[220px_1fr]
        ">
        <img className="
            mx-auto
            h-48
            w-48
            rounded-full
            border-4
            border-cyan-300/30
            object-cover
            shadow-xl
            shadow-cyan-950/50
            md:h-52
            md:w-52
          " src="/assets/images/profile/1x1-photo-of-myself.jpg" alt="Portrait of Marc Whesley Bartolome" />
        <div>
          <p className="
              mb-2
              text-sm
              font-semibold
              uppercase
              tracking-[0.2em]
              text-cyan-300
            ">About me</p>
          <h2 className="
              text-3xl
              font-bold
              text-white
              sm:text-4xl
            ">Curious by nature, building one project at a time.</h2>
          <p className="
              mt-5
              max-w-3xl
              leading-7
              text-slate-300
            ">Hello! I'm Marc Whesley. I am interested in programming, technology, and design. I like learning by
            making things, solving practical problems, and sharing what I discover along the way.</p>
          <p className="
              mt-4
              max-w-3xl
              leading-7
              text-slate-300
            ">My goal is to keep growing as an IT professional and create software that is useful, thoughtful, and easy
            for people to use.</p>
          <div className="
              mt-6
              flex
              flex-wrap
              gap-2

              [&>span]:rounded-full
              [&>span]:border
              [&>span]:border-cyan-300/20
              [&>span]:bg-cyan-300/10
              [&>span]:px-3
              [&>span]:py-1
              [&>span]:text-sm
              [&>span]:text-cyan-100
            " aria-label="Personal interests">
            <span>Programming</span>
            <span>Technology</span>
            <span>Food discovery</span>
            <span>Stories and series</span>
          </div>

          <button type="button" onClick={onShowFact} className="
              mt-4
              rounded-full
              bg-indigo-600 
              px-4 
              py-2 
              text-white 
              hover:bg-indigo-500
              ">
            Fun facts</button>
          <p className="mt-2 italic">{fact}</p>
        </div>
      </div>

    </section>
    );
}
