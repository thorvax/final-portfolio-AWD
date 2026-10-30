type SkillCardProps = {
    title: string;
    items: string[];
};

export default function SkillCard({ title, items }: SkillCardProps) {
    return (
        <article>
          <h3>{title}</h3>
          <ul>
            {items.map((item) => (
              <li key={item}>{item}</li>
            ))}
          </ul>
        </article>
    );
}
