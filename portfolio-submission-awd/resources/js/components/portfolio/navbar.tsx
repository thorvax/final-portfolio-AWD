type NavbarProps = {
    tagline: string;
    isMenuOpen: boolean;
    setIsMenuOpen: (open: boolean) => void;
};

export default function Navbar({ tagline, isMenuOpen, setIsMenuOpen }: NavbarProps) {
    return (
  <header className="
      sticky
      top-0
      z-40
      border-b
      border-white/10
      bg-slate-950/90
      backdrop-blur
    ">
    <div className="
        mx-auto
        flex
        max-w-6xl
        flex-wrap
        items-center
        justify-between
        gap-4
        px-5
        py-4
      ">
      <a className="
          text-lg
          font-bold
          tracking-wide
          text-cyan-300
        " href="#home">{tagline}</a>
      <button className="
          inline-flex
          min-h-11
          min-w-11
          items-center
          justify-center
          rounded-lg
          border
          border-white/15
          text-2xl
          text-cyan-200
          hover:bg-white/10
          focus-visible:outline-2
          focus-visible:outline-offset-2
          focus-visible:outline-cyan-300
          md:hidden
        " type="button" aria-controls="primary-navigation" aria-expanded={isMenuOpen} aria-label={isMenuOpen ? 'Close navigation menu' : 'Open navigation menu'} onClick={() => setIsMenuOpen(!isMenuOpen)}>
        <span aria-hidden="true">☰</span>
      </button>
      <nav className={`
          w-full
          flex-col
          gap-1
          md:flex
          md:w-auto
          md:flex-row
          md:items-center
          md:gap-2

          [&>a]:rounded-lg
          [&>a]:px-3
          [&>a]:py-2
          [&>a]:text-sm
          [&>a]:font-medium
          [&>a]:text-slate-300

          [&>a:hover]:bg-white/10
          [&>a:hover]:text-cyan-200

          [&>a:focus-visible]:outline-2
          [&>a:focus-visible]:outline-cyan-300
          ${isMenuOpen ? 'flex' : 'hidden'}
        `} aria-label="Main navigation" onClick={() => setIsMenuOpen(false)}>
        <a href="#home">Home</a>
        <a href="#about">About</a>
        <a href="#skills">Skills</a>
        <a href="#projects">Projects</a>
        <a href="#education">Education</a>
        <a href="#contact">Contact</a>
      </nav>
    </div>
  </header>
    );
}
