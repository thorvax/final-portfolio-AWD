type ProjectCardProps = {
    title: string;
    description: string;
    tools: string[];
    image: string;
    imageAlt: string;
};

export default function ProjectCard({ title, description, tools, image, imageAlt }: ProjectCardProps) {
    return (
        <article>
          <img src={image} alt={imageAlt} loading="lazy" />
          <div>
            <h3>{title}</h3>
            <p>{description}</p>
            <ul aria-label="Tools used">
              {tools.map((tool) => (
                <li key={tool}>{tool}</li>
              ))}
            </ul>
          </div>
        </article>
    );
}
