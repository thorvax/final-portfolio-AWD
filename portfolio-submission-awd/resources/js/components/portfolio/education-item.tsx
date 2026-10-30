type EducationItemProps = {
    label: string;
    title: string;
    subtitle: string;
    description: string;
};

export default function EducationItem({ label, title, subtitle, description }: EducationItemProps) {
    return (
        <li className="
            ml-6
            pb-2
          ">

          <article className="
              rounded-2xl
              border
              border-white/10
              bg-slate-900/70
              p-6
            ">
            <p className="
                text-sm
                font-semibold
                text-cyan-200
              ">{label}</p>
            <h3 className="
                mt-1
                text-xl
                font-semibold
                text-white
              ">{title}</h3>
            <p className="
                mt-1
                text-sm
                text-slate-400
              ">{subtitle}</p>
            <p className="
                mt-3
                leading-6
                text-slate-300
              ">{description}</p>
          </article>
        </li>
    );
}
