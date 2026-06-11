import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import CompetitionLayout from "./Components/CompetitionLayout";
import { Head, useForm } from "@inertiajs/react";
import TeamTable from "../Teams/Components/TeamTable";
import Modal from "@/Components/Modal";
import { useState } from "react";
import TeamRemove from "./Components/TeamRemove";
import PlusCircle from "@/Icons/PlusCircle";
import Checkbox from "@/Components/Checkbox";
import SecondaryButton from "@/Components/SecondaryButton";
import PrimaryButton from "@/Components/PrimaryButton";
import TeamLogo from "../Teams/Components/TeamLogo";
import Pagination from "@/Components/Pagination";

export default function CompetitionTeamsShow({
    competition,
    teams,
    availableTeams,
}) {
    const [isRemoveModalOpen, setIsRemoveModalOpen] = useState(false);
    const [isBulkAddModalOpen, setIsBulkAddModalOpen] = useState(false);
    const [selectedTeam, setSelectedTeam] = useState(null);

    const bulkAddForm = useForm({
        teams: [],
    });

    const toggleSelectedTeam = (teamId, checked) => {
        const currentTeams = bulkAddForm.data.teams;

        const updatedTeams = checked
            ? [...currentTeams, teamId]
            : currentTeams.filter((id) => id !== teamId);

        bulkAddForm.setData("teams", updatedTeams);
    };

    const submitBulkAddForm = (e) => {
        e.preventDefault();

        bulkAddForm.post(route("competitions.teams.add", competition.id), {
            onSuccess: () => {
                setIsBulkAddModalOpen(false);
            },
        });
    };

    return (
        <AuthenticatedLayout>
            <Head title="Competition Details" />
            <CompetitionLayout competition={competition}>
                <div className="p-6 text-gray-900">
                    {teams.data && teams.data.length > 0 ? (
                        <TeamTable
                            teams={teams.data}
                            actions={[
                                {
                                    icon: "view",
                                    onClick: (team) => {
                                        // TODO: Implement view team competition details
                                        console.log(
                                            "View team competition details:",
                                            team,
                                        );
                                    },
                                },
                                {
                                    icon: "remove",
                                    onClick: (team) => {
                                        // Clicking here error!
                                        setSelectedTeam(team);
                                        setIsRemoveModalOpen(true);
                                    },
                                },
                            ]}
                        />
                    ) : (
                        <div className="flex justify-center items-center">
                            <PlusCircle
                                className="w-12 cursor-pointer text-primaryRed-600"
                                onClick={() => setIsBulkAddModalOpen(true)}
                            />
                        </div>
                    )}
                </div>
            </CompetitionLayout>
            {teams.data && teams.data.length > 0 && (
                <Pagination links={teams.links} meta={teams.meta} />
            )}
            <Modal
                show={isRemoveModalOpen}
                onClose={() => {
                    setSelectedTeam(null);
                    setIsRemoveModalOpen(false);
                }}
            >
                <TeamRemove
                    team={selectedTeam}
                    competition={competition}
                    onCancel={() => {
                        setSelectedTeam(null);
                        setIsRemoveModalOpen(false);
                    }}
                    onSuccess={() => {
                        setSelectedTeam(null);
                        setIsRemoveModalOpen(false);
                    }}
                />
            </Modal>
            <Modal
                show={isBulkAddModalOpen}
                onClose={() => {
                    setIsBulkAddModalOpen(false);
                }}
            >
                <form className="p-4" onSubmit={submitBulkAddForm}>
                    <h1 className="mb-4">
                        Select teams to add to this competition
                    </h1>
                    <div className="grid grid-cols-3">
                        {availableTeams.map((team) => (
                            <Checkbox
                                key={team.id}
                                value={team.id}
                                checked={bulkAddForm.data.teams.includes(
                                    team.id,
                                )}
                                onChange={(e) =>
                                    toggleSelectedTeam(
                                        team.id,
                                        e.target.checked,
                                    )
                                }
                            >
                                <div className="flex gap-2 items-center">
                                    <TeamLogo team={team} size={6} />
                                    {team.name}
                                </div>
                            </Checkbox>
                        ))}
                    </div>
                    <div className="flex gap-2 justify-end mt-8">
                        <SecondaryButton
                            onClick={() => setIsBulkAddModalOpen(false)}
                        >
                            Cancel
                        </SecondaryButton>
                        <PrimaryButton type="submit">Add</PrimaryButton>
                    </div>
                </form>
            </Modal>
        </AuthenticatedLayout>
    );
}
