type SectionTitleProps = {
    eyebrow: string;
    title: string;
    description?: string;
};

export default function SectionTitle({ eyebrow, title, description }: SectionTitleProps) {
    return (
      <div className="
          mb-8
          max-w-2xl
        ">
        <p className="
            mb-2
            text-sm
            font-semibold
            uppercase
            tracking-[0.2em]
            text-cyan-300
          ">{eyebrow}</p>
        <h2 className="
            text-3xl
            font-bold
            text-white
            sm:text-4xl
          ">{title}</h2>
        {description && (
          <p className="
              mt-3
              leading-7
              text-slate-300
            ">{description}</p>
        )}
      </div>
    );
}
