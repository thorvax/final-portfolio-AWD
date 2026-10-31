type ProjectCardProps = {
    title: string;
    description: string;
    tools: string[];
    image: string;
    imageAlt: string;
    projectUrl?: string | null;
    repoUrl?: string | null;
};

const linkClass =
    'rounded-lg border border-cyan-300/40 px-3 py-1.5 text-sm font-medium text-cyan-100 transition hover:bg-cyan-300/10';

export default function ProjectCard({
    title,
    description,
    tools,
    image,
    imageAlt,
    projectUrl,
    repoUrl,
}: ProjectCardProps) {
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

            {(repoUrl || projectUrl) && (
              <div className="mt-5 flex flex-wrap gap-3">
                {repoUrl && (
                  <a
                    href={repoUrl}
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label={`${title} on GitHub (opens in a new tab)`}
                    className={linkClass}
                  >
                    GitHub
                  </a>
                )}
                {projectUrl && (
                  <a
                    href={projectUrl}
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label={`${title} live project (opens in a new tab)`}
                    className={linkClass}
                  >
                    Live demo
                  </a>
                )}
              </div>
            )}
          </div>
        </article>
    );
}