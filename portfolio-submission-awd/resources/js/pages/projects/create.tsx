import { Head, useForm } from '@inertiajs/react';
import ProjectForm, { type ProjectFormData } from '@/components/project-form';

export default function Create() {
    const form = useForm<ProjectFormData>({
        title: '',
        description: '',
        tech_stack: '',
        date_completed: '',
    });

    function submit(e: React.FormEvent) {
        e.preventDefault();
        form.post('/projects');
    }

    return (
        <>
            <Head title="Add Project" />
            <div className="mx-auto max-w-2xl p-6">
                <h1 className="mb-6 text-2xl font-bold">Add Project</h1>
                <ProjectForm form={form} onSubmit={submit} submitLabel="Save project" />
            </div>
        </>
    );
}