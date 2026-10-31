import { Head, useForm } from '@inertiajs/react';
import ProjectForm, { type ProjectFormData } from '@/components/project-form';

type Project = {
    id: number;
    title: string;
    description: string;
    tech_stack: string;
    date_completed: string;
    image: string | null;
    project_url: string | null;
    repo_url: string | null;
};

type Props = {
    project: Project;
};

export default function Edit({ project }: Props) {
    const form = useForm<ProjectFormData>({
        title: project.title,
        description: project.description,
        tech_stack: project.tech_stack,
        date_completed: project.date_completed.slice(0, 10),
        image: null,
        project_url: project.project_url ?? '',
        repo_url: project.repo_url ?? '',

    });

    function submit(e: React.SyntheticEvent) {
        e.preventDefault();

        form.transform((data) => ({ ...data, _method: 'put' }));
        form.post(`/projects/${project.id}`);
    }

    return (
        <>
            <Head title="Edit Project" />
            <div className="mx-auto max-w-2xl p-6">
                <h1 className="mb-6 text-2xl font-bold">Edit Project</h1>
                <ProjectForm form={form} onSubmit={submit} submitLabel="Update project" />
            </div>
        </>
    );
}