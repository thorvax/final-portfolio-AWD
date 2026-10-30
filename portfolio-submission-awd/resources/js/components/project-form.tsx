import type { useForm } from '@inertiajs/react';
import InputError from '@/components/input-error';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';

export type ProjectFormData = {
    title: string;
    description: string;
    tech_stack: string;
    date_completed: string;
};

type Props = {
    form: ReturnType<typeof useForm<ProjectFormData>>;
    onSubmit: (e: React.FormEvent) => void;
    submitLabel: string;
};

export default function ProjectForm({ form, onSubmit, submitLabel }: Props) {
    return (
        <form onSubmit={onSubmit} noValidate className="space-y-5">
            <div className="grid gap-2">
                <Label htmlFor="title">Title</Label>
                <Input
                    id="title"
                    value={form.data.title}
                    onChange={(e) => form.setData('title', e.target.value)}
                />
                <InputError message={form.errors.title} />
            </div>

            <div className="grid gap-2">
                <Label htmlFor="description">Description</Label>
                <textarea
                    id="description"
                    className="border-input min-h-28 rounded-md border bg-transparent px-3 py-2"
                    value={form.data.description}
                    onChange={(e) => form.setData('description', e.target.value)}
                />
                <InputError message={form.errors.description} />
            </div>
            <div className="grid gap-2">
                <Label htmlFor="tech_stack">Tech stack</Label>
                <Input
                    id="tech_stack"
                    placeholder="C++, File handling, System operations"
                    value={form.data.tech_stack}
                    onChange={(e) => form.setData('tech_stack', e.target.value)}
                />
                <InputError message={form.errors.tech_stack} />
            </div>
            <div className="grid gap-2">
                <Label htmlFor="date_completed">Date completed</Label>
                <Input
                    id="date_completed"
                    type="date"
                    value={form.data.date_completed}
                    onChange={(e) => form.setData('date_completed', e.target.value)}
                />
                <InputError message={form.errors.date_completed} />
            </div>

            <Button type="submit" disabled={form.processing}>
                {submitLabel}
            </Button>
        </form>
    );
}