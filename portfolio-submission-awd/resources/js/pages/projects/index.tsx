import { Head, Link, router } from '@inertiajs/react';

type Project = {
    id: number;
    title: string;
    description: string;
    tech_stack: string;
    project_url: string | null;
    repo_url: string | null;
    image: string | null;
    date_completed: string;
};

type Props = {
    projects: Project[];
};

export default function Index({ projects }: Props) {
    function handleDelete(project: Project) {
        if (window.confirm(`Delete "${project.title}"? This cannot be undone.`)) {
            router.delete(`/projects/${project.id}`);
        }
    }

    return (
        <>
            <Head title="Manage Projects" />
            <div className="mx-auto w-full max-w-5xl p-6">
                <div className="mb-6 flex items-center justify-between">
                    <h1 className="text-2xl font-bold">Projects</h1>
                    <Link
                        href="/projects/create"
                        className="rounded-md bg-white px-4 py-2 text-sm font-medium text-black"
                    >
                        Add project
                    </Link>
                </div>

                {projects.length === 0 ? (
                    <p>No projects yet.</p>
                ) : (
                    <table className="w-full text-left text-sm [&>thead>tr>th]:py-2 [&>thead>tr>th]:pr-6">
                        <thead>
                            <tr className="border-b">
                                <th >Title</th>
                                <th >Tech stack</th>
                                <th >Completed</th>
                                <th >Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {projects.map((project) => (
                                <tr key={project.id} className="border-b  [&>td]:py-3 [&>td]:pr-6">
                                    <td>{project.title}</td>
                                    <td>{project.tech_stack}</td>
                                    <td>{project.date_completed}</td>
                                    <td className="flex gap-3">
                                        <Link href={`/projects/${project.id}/edit`} className="underline">
                                            Edit
                                        </Link>
                                        <button
                                            type="button"
                                            onClick={() => handleDelete(project)}
                                            className="text-red-500 underline"
                                        >
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            ))}
                        </tbody>
                    </table>
                )}
            </div >
        </>
    );
}