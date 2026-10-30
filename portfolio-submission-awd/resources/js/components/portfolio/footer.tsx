export default function Footer() {
    return (
  <footer className="
      border-t
      border-white/10
      px-5
      py-8
      text-center
      text-sm
      text-slate-400
    ">
    <p>&copy; {new Date().getFullYear()} Marc Whesley Bartolome. Built with React and Tailwind CSS.</p>
    <p className="
        mt-2
      ">Project images are used from my existing portfolio assets. The portfolio preview illustration is original.</p>
  </footer>
    );
}
