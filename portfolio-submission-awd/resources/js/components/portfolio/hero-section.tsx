export default function HeroSection() {
    return (
    <section id="home" className="
        scroll-mt-28
        py-24
        text-center
        sm:py-32
      ">
      <p className="
          mb-4
          text-sm
          font-semibold
          uppercase
          tracking-[0.25em]
          text-cyan-300
        ">Aspiring IT Professional</p>
      <h1 className="
          mx-auto
          max-w-4xl
          text-4xl
          font-bold
          tracking-tight
          text-white
          sm:text-6xl
        ">Marc Whesley Bartolome</h1>
      <p className="
          mx-auto
          mt-6
          max-w-2xl
          text-lg
          leading-8
          text-slate-300
        ">I enjoy exploring technology, building useful software, and bringing creative ideas to life through code.</p>
      <div className="
          mt-9
          flex
          flex-wrap
          justify-center
          gap-4

          [&>a]:rounded-full
          [&>a]:px-6
          [&>a]:py-3
          [&>a]:font-semibold
        ">
        <a className="
            bg-cyan-300
            text-slate-950
            transition
            hover:bg-cyan-200
            focus-visible:outline-cyan-200
          " href="#projects">Explore my projects</a>
        <a className="
            border
            border-slate-500
            text-slate-100
            transition
            hover:border-cyan-300
            hover:text-cyan-200
            focus-visible:outline-cyan-300
          " href="#contact">Get in touch</a>
      </div>
    </section>
    );
}
