import FileInput from "@/Components/FileInput";
import InputLabel from "@/Components/InputLabel";
import PrimaryButton from "@/Components/PrimaryButton";
import SecondaryButton from "@/Components/SecondaryButton";
import TextAreaInput from "@/Components/TextAreaInput";
import TextInput from "@/Components/TextInput";
import { useForm } from "@inertiajs/react";

export default function TeamEdit({ team, onSuccess, onCancel }) {
    if (!team) return <div></div>;

    const form = useForm({
        name: team.name ?? "",
        history: team.history ?? "",
        first_color: team.first_color ?? "",
        second_color: team.second_color ?? "",
        stadium: team.stadium ?? "",
        year_of_foundation: team.year_of_foundation ?? 0,
        rating: team.rating ?? 30,
        remove_logo: false,
    });

    const submit = (e) => {
        e.preventDefault();

        form.post(
            route("teams.update", {
                team: team.id,
            }),
            {
                preserveScroll: true,
                onSuccess: () => {
                    form.reset();
                    onSuccess?.();
                },
                onError: (error) => {
                    console.log({ error });
                },
            },
        );
    };

    return (
        <div className="p-6">
            <h3 className="text-lg font-medium text-primaryRed-600">
                Edit {team.name}
            </h3>
            <p className="mt-1 text-sm text-darkGray-600">
                Update the team information below.
            </p>
            <form className="flex flex-col mt-4 space-y-4" onSubmit={submit}>
                <div className="flex gap-12 items-center">
                    <div>
                        <InputLabel htmlFor="name">Name</InputLabel>
                        <TextInput
                            id="name"
                            value={form.data.name}
                            onChange={(e) =>
                                form.setData("name", e.target.value)
                            }
                            placeholder="Team name"
                        />
                        {form.errors.name && (
                            <div className="mt-1 text-sm text-red-600">
                                {form.errors.name}
                            </div>
                        )}
                    </div>
                    <div>
                        <InputLabel>Colors</InputLabel>
                        <div className="flex gap-2">
                            <input
                                value={form.data.first_color}
                                type="color"
                                id="first_color"
                                onChange={(e) =>
                                    form.setData("first_color", e.target.value)
                                }
                            />
                            <input
                                value={form.data.second_color}
                                type="color"
                                id="second_color"
                                onChange={(e) =>
                                    form.setData("second_color", e.target.value)
                                }
                            />
                        </div>
                        {form.errors.name && (
                            <div className="mt-1 text-sm text-red-600">
                                {form.errors.first_color}
                            </div>
                        )}
                        {form.errors.name && (
                            <div className="mt-1 text-sm text-red-600">
                                {form.errors.second_color}
                            </div>
                        )}
                    </div>
                </div>
                <div>
                    <InputLabel htmlFor="description">History</InputLabel>
                    <TextAreaInput
                        className="mt-1 w-full"
                        id="description"
                        value={form.data.history}
                        onChange={(e) =>
                            form.setData("history", e.target.value)
                        }
                        placeholder="Competition history"
                        rows={5}
                    />
                    {form.errors.history && (
                        <div className="mt-1 text-sm text-red-600">
                            {form.errors.history}
                        </div>
                    )}
                </div>
                <div>
                    <InputLabel htmlFor="stadium">Stadium</InputLabel>
                    <TextInput
                        id="stadium"
                        value={form.data.stadium}
                        onChange={(e) =>
                            form.setData("stadium", e.target.value)
                        }
                        placeholder="Stadium name"
                    />
                    {form.errors.name && (
                        <div className="mt-1 text-sm text-red-600">
                            {form.errors.stadium}
                        </div>
                    )}
                </div>
                <div>
                    <InputLabel htmlFor="year_of_foundation">
                        Year of foundation
                    </InputLabel>
                    <TextInput
                        id="year_of_foundation"
                        value={form.data.year_of_foundation}
                        onChange={(e) =>
                            form.setData("year_of_foundation", e.target.value)
                        }
                        type="number"
                        placeholder="Year of foundation"
                    />
                    {form.errors.name && (
                        <div className="mt-1 text-sm text-red-600">
                            {form.errors.year_of_foundation}
                        </div>
                    )}
                </div>
                <div>
                    <InputLabel htmlFor="rating">Rating</InputLabel>
                    <TextInput
                        id="rating"
                        value={form.data.rating}
                        onChange={(e) => form.setData("rating", e.target.value)}
                        type="number"
                        placeholder="Rating"
                        min="30"
                        max="100"
                    />
                    {form.errors.name && (
                        <div className="mt-1 text-sm text-red-600">
                            {form.errors.rating}
                        </div>
                    )}
                </div>
                <div>
                    <InputLabel htmlFor="logo">Logo</InputLabel>
                    <FileInput
                        id="logo"
                        name="logo"
                        accept="image/*"
                        existingUrl={team?.logo ?? null}
                        buttonLabel="Upload logo"
                        onChange={({ file, remove }) => {
                            form.setData("logo", file);
                            form.setData("remove_logo", remove);
                        }}
                    />
                </div>
                <div className="flex gap-2 justify-end mt-8">
                    <SecondaryButton
                        type="button"
                        onClick={() => {
                            form.reset("logo");
                            onCancel?.();
                        }}
                    >
                        Cancel
                    </SecondaryButton>

                    <PrimaryButton type="submit" disabled={form.processing}>
                        Save
                    </PrimaryButton>
                </div>
            </form>
        </div>
    );
}
